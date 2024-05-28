<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Contracts\ISendEmailService;
use App\Mail\appointmentMail;
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

    public function __construct(IGenerateIdService $generateId, ISendEmailService $sendEmail) {
        $this->generateId = $generateId;
        $this->sendEmail = $sendEmail;
    }

    public function appointments() {
        $pendingAppointments = Appointments::with('doctors', 'patients', 'services')
        ->where('patient', session('logged_patient'))
        ->where('status', 'Pending')
        ->orderBy('appointment_date', 'ASC')->get();

        $approvedAppointments = Appointments::with('doctors', 'patients', 'services')
        ->where('patient', session('logged_patient'))
        ->where('status', 'Approved')
        ->orderBy('appointment_date', 'ASC')->get();

        $rejectedAppointments = Appointments::with('doctors', 'patients', 'services')
        ->where('patient', session('logged_patient'))
        ->where('status', 'Rejected')
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
        $patient = patients::find(session('logged_patient'));
        return view('Patient.Appointment.bookAppointment',[
            "service_types" => service_type::all(),
            "services" => service::all(),
            'patient' => $patient
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
        $this->sendEmail->send(new appointmentMail($appointmentId, "Pending", $service->service, $appointmentDate.' at '.$appointmentTime, $doctor->firstname.' '.$doctor->lastname), $patient->email);

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
}
