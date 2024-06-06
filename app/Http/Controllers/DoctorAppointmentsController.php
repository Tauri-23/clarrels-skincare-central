<?php

namespace App\Http\Controllers;

use App\Contracts\ISendEmailService;
use App\Mail\appointmentMail;
use App\Mail\followUpCancelAppointmentMail;
use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\prescriptions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorAppointmentsController extends Controller
{
    protected $sendEmail;
    public function __construct(ISendEmailService $sendEmail) {
        $this->sendEmail = $sendEmail;
    }

    public function index($activeStatus) {
        $appointments = Appointments::with('patients', 'services')
        ->orderBy('appointment_date', 'ASC')
        ->where('doctor', session('logged_doctor'))
        ->where('status', "Pending")
        ->whereNotNull('patient')
        ->whereNotNull('service')
        ->whereNotNull('service_type')
        ->get();

        $approved = Appointments::with('patients', 'services')
        ->orderBy('appointment_date', 'ASC')
        ->where('doctor', session('logged_doctor'))
        ->where('status', "Approved")
        ->whereNotNull('patient')
        ->whereNotNull('service')
        ->whereNotNull('service_type')
        ->get();

        $rejectedAppointments = Appointments::with('patients', 'services')
        ->where('doctor', session('logged_doctor'))
        ->where('status', "Rejected")
        ->whereNotNull('patient')
        ->whereNotNull('service')
        ->whereNotNull('service_type')
        ->get();
        
        $doctor = Doctors::find(session('logged_doctor'));
        if(!$doctor) {
            return redirect('/');
        }
        return view('Doctor.Appointments.index', [
            'doctor' => $doctor,
            'appointments' => $appointments,
            'approved' => $approved,
            "rejectedAppointments" => $rejectedAppointments,
            'activeStatus' => $activeStatus,
        ]);
    }

    public function changeStatus(Request $request) {
        $appointment = Appointments::find($request->appointmentId);

        if($request->newStatus == "Rejected") {
            $appointment->status = $request->newStatus;
            $appointment->reason = $request->reason;
        }
        else if($request->newStatus == "To Pay") {
            if($request->addPrescription == "true") {
                $prescrtiption = new prescriptions();
                $prescrtiption->appointment = $appointment->id;
                $prescrtiption->prescription = $request->prescrition;

                $prescrtiption->save();
            }
            $appointment->status = $request->newStatus;
        }
        else {
            $appointment->status = $request->newStatus;
        }
        
        
        
        if($appointment->save()) {
            $doctorAssigned = $appointment->doctors()->first()->firstname.' '.$appointment->doctors()->first()->lastname;
            $appointmentDate = Carbon::parse($appointment->appointment_date)->format('M d, Y');
            $appointmentTime = Carbon::parse($appointment->appointment_time)->format('g:i a');
            
            if($request->newStatus == "Rejected") {
                $this->sendEmail->send(new appointmentMail($request->appointmentId, $request->newStatus, $appointment->services()->first()->service, $appointmentDate.' '.$appointmentTime, $doctorAssigned, $request->reason), $appointment->patients()->first()->email);
            }
            else {
                $this->sendEmail->send(new appointmentMail($request->appointmentId, $request->newStatus, $appointment->services()->first()->service, $appointmentDate.' '.$appointmentTime, $doctorAssigned, 'none'), $appointment->patients()->first()->email);
            }
            
            return response()->json([
                'status' => 200,
                'message' => $request->newStatus == "Completed" ? 'Appointment Marked as Done' : ($request->newStatus == "Approved" ? 'Appointment Approved' : 'Appointment Rejected')
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }

    public function cancelFollowUpPost(Request $request) {
        $appointment = Appointments::find($request->appointmentId);

        $appointment->status = 'Canceled';
        $appointment->reason = $request->reason;

        if($appointment->save()) {
            $doctorAssigned = $appointment->doctors()->first()->firstname.' '.$appointment->doctors()->first()->lastname;

            $this->sendEmail->send(new followUpCancelAppointmentMail($appointment->id, $appointment->services()->first()->service, $doctorAssigned, $request->reason), $appointment->patients()->first()->email);

            return response()->json([
                'status' => 200,
                'message' => 'Follow-up appointment successfully canceled'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }

    }
}
