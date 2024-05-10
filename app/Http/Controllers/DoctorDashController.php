<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\patients;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorDashController extends Controller
{
    public function doctorDash() {
        $today = Carbon::now()->toDateString();
        $patients = patients::all();
        $appointments = Appointments::where('doctor', session('logged_doctor'));
        $todayAppointment = Appointments::where('appointment_date', $today);
        $doctor = Doctors::find(session('logged_doctor'));
        if(!$doctor) {
            return redirect('/');
        }
        return view('Doctor.index', [
            'doctor' => $doctor,
            'appointments' => $appointments,
            'patients' => $patients,
            'appointment_today' => $todayAppointment
        ]);
    }
}
