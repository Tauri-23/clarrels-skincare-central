<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Contracts\ISendEmailService;
use App\Mail\appointmentMail;
use App\Mail\followUpAppointmentMail;
use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\patients;
use App\Models\service;
use App\Models\service_type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    protected $generateId;
    protected $sendEmail;

    public function __construct(IGenerateIdService $generateId, ISendEmailService $sendEmail,) {
        $this->generateId = $generateId;
        $this->sendEmail = $sendEmail;
    }

    public function appointments() {
        $pendingAppointments = Appointments::with('doctors', 'patients', 'services')
        ->where('patient', session('logged_patient'))
        ->where('status', 'Pending')
        ->whereNotNull('service')
        ->whereNotNull('service_type')
        ->orderBy('appointment_date', 'ASC')->get();

        $approvedAppointments = Appointments::with('doctors', 'patients', 'services')
        ->where('patient', session('logged_patient'))
        ->where('status', 'Approved')
        ->whereNotNull('service')
        ->whereNotNull('service_type')
        ->orderBy('appointment_date', 'ASC')->get();

        $rejectedAppointments = Appointments::with('doctors', 'patients', 'services')
        ->where('patient', session('logged_patient'))
        ->where('status', 'Rejected')
        ->whereNotNull('service')
        ->whereNotNull('service_type')
        ->orderBy('appointment_date', 'ASC')->get();

        $patient = patients::find(session('logged_patient'));
        
        return view('Patient.Appointment.index', [
            'pendingAppointments' => $pendingAppointments,
            'approvedAppointments' => $approvedAppointments,
            'rejectedAppointments' => $rejectedAppointments,
            'patient' => $patient
        ]);
    }

    public function bookAppointment() {
        $approvedAndPendingAppointments = Appointments::with('doctors', 'patients', 'services')
        ->where(function($query) {
            $query->where('status', 'Pending')
                  ->orWhere('status', 'Approved');
        })
        ->whereNotNull('service')
        ->whereNotNull('service_type')
        ->orderBy('appointment_date', 'ASC')
        ->get();

        $patient = patients::find(session('logged_patient'));
        return view('Patient.Appointment.bookAppointment',[
            "service_types" => service_type::all(),
            "services" => service::all(),
            'patient' => $patient,
            'approvedAndPendingAppointments' => $approvedAndPendingAppointments
        ]);
    }

    public function bookAppointmentPost(Request $request) {

        $patient = patients::find(session('logged_patient'));
        $doctorAssigned = $request->serviceType == "100000" ? "267402" : "878334";

        $appointmentId = $this->generateId->generate(Appointments::class, 12);

        $appointment = new Appointments;
        $appointment->id = $appointmentId;
        $appointment->patient = $patient->id;
        $appointment->doctor = $doctorAssigned;
        $appointment->appointment_date = $request->date;
        $appointment->appointment_time = $request->time;
        $appointment->service_type = $request->serviceType;
        $appointment->service = $request->service;
        $appointment->patient_name = $request->patientName;
        $appointment->patient_phone = $request->phone;
        $appointment->note = $request->note;
        $appointment->status = "Pending";
        

        // Send Email
        $service = service::find($request->service);
        $doctor = Doctors::find($doctorAssigned);
        $appointmentDate = Carbon::parse($request->date)->format('M d, Y');
        $appointmentTime = Carbon::parse($request->time)->format('g:i a');
        $this->sendEmail->send(new appointmentMail($appointmentId, "Pending", $service->service, $appointmentDate.' at '.$appointmentTime, $doctor->firstname.' '.$doctor->lastname, "null"), $patient->email);

        if($appointment->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'error'
            ]);
        }
        
    }

    public function cancelAppointmentPost(Request $request) {
        $appointment = Appointments::find($request->appointmentId);

        $appointment->status = 'Canceled';

        if($appointment->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Appointment successfully canceled.'
            ]);
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }
    
    public function approveFollowUpPost(Request $request) {
        $appointment = Appointments::find($request->appointmentId);
        $patient = patients::find(session(('logged_patient')));

        $appointment->status = 'Approved';

        if($appointment->save()) {
            $doctorAssigned = $appointment->doctors()->first()->firstname.' '.$appointment->doctors()->first()->lastname;
            $service = service::find($appointment->service);
            $appointmentDate = Carbon::parse($appointment->appointment_date)->format('M d, Y');
            $appointmentTime = Carbon::parse($appointment->appointment_time)->format('g:i a');

            $this->sendEmail->send(new followUpAppointmentMail($request->appointmentId, "Approved", $service->service, $appointmentDate.' at '.$appointmentTime, $doctorAssigned), $patient->email);

            return response()->json([
                'status' => 200,
                'message' => 'Appointment successfully canceled.'
            ]);
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }
}
