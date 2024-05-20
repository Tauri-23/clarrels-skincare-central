<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorAppointmentsController extends Controller
{
    public function index() {
        $appointments = Appointments::with('patients', 'services')->where('doctor', session('logged_doctor'))->where('status', "Pending")->get();
        $rejectedAppointments = Appointments::where('doctor', session('logged_doctor'))->where('status', "Rejected")->get();
        $doctor = Doctors::find(session('logged_doctor'));
        if(!$doctor) {
            return redirect('/');
        }
        return view('Doctor.Appointments.index', [
            'doctor' => $doctor,
            'appointments' => $appointments,
            "rejectedAppointments" => $rejectedAppointments
        ]);
    }

    public function changeStatus(Request $request) {
        $appointment = Appointments::find($request->appointmentId);

        $appointment->status = $request->newStatus;
        
        if($appointment->save()) {
            return response()->json([
                'status' => 200,
                'message' => $request->newStatus == "Completed" ? 'Appointment Marked as Done' : 'Appointment Rejected'
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
