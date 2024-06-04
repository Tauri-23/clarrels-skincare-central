<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Contracts\ISendEmailService;
use App\Mail\followUpAppointmentMail;
use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\patients;
use App\Models\service;
use App\Models\service_type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorFollowUpsController extends Controller
{
    protected $generateId;
    protected $sendEmail;

    public function __construct(IGenerateIdService $generateId, ISendEmailService $sendEmail) {
        $this->generateId = $generateId;
        $this->sendEmail = $sendEmail;
    }

    public function index() {
        $doctor = Doctors::find(session('logged_doctor'));
        $followUpAppointmentApproved = Appointments::with('patients', 'doctors')
        ->where('is_follow_up', 1)
        ->where('status', 'Approved')
        ->whereNotNull('patient')
        ->whereNotNull('service')
        ->whereNotNull('service_type')
        ->get();

        if(!$doctor) {
            return redirect('/');
        }

        return view('Doctor.Followups.index',[
            'doctor' => $doctor,
            'followUpAppointmentApproved' => $followUpAppointmentApproved
        ]);
    }

    public function bookFollowUp($id) {
        $patient = patients::find($id);
        $doctor = Doctors::find(session('logged_doctor'));

        if(!$doctor) {
            return redirect('/');
        }

        return view('Doctor.Followups.bookFollowup',[
            "service_types" => service_type::all(),
            "services" => service::all(),
            'doctor' => $doctor,
            'patient' => $patient
        ]);

    }

    public function bookFollowUpPost(Request $request) {
        $patient = patients::find($request->patientId);
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
        $appointment->is_follow_up = 1;
        $appointment->status = "Pending";

        // Send Email
        $service = service::find($request->service);
        $doctor = Doctors::find($doctorAssigned);
        $appointmentDate = Carbon::parse($request->date)->format('M d, Y');
        $appointmentTime = Carbon::parse($request->time)->format('g:i a');
        $this->sendEmail->send(new followUpAppointmentMail($appointmentId, "Pending", $service->service, $appointmentDate.' at '.$appointmentTime, $doctor->firstname.' '.$doctor->lastname), $patient->email);

        if($appointment->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Book follow-up appointment successfull.'
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
