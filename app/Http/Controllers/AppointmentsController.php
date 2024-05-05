<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Models\Appointments;
use App\Models\service;
use App\Models\service_type;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    protected $generateId;

    public function __construct(IGenerateIdService $generateId) {
        $this->generateId = $generateId;
    }

    public function appointments() {
        return view('Patient.Appointment.index', [
            'appointments' => Appointments::where('patient', session('logged_patient'))
                ->where('status', 'Pending')
                ->orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function bookAppointment() {
        return view('Patient.Appointment.bookAppointment',[
            "service_types" => service_type::all(),
            "services" => service::all()
        ]);
    }

    public function bookAppointmentPost(Request $request) {

        $doctorAssigned = $request->serviceType == "100000" ? "267402" : "878334";

        $appointment = new Appointments;
        $appointment->id = $this->generateId->generate(Appointments::class, 12);
        $appointment->patient = session('logged_patient');
        $appointment->doctor = $doctorAssigned;
        $appointment->appointment_date = $request->date;
        $appointment->appointment_time = $request->time;
        $appointment->service_type = $request->serviceType;
        $appointment->service = $request->service;
        $appointment->patient_name = $request->patientName;
        $appointment->patient_phone = $request->phone;
        $appointment->note = $request->note;
        $appointment->status = "Pending";

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
