<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorAppointmentsController extends Controller
{
    public function index() {
        $appointments = Appointments::where('doctor', session('logged_doctor'))->get();
        $doctor = Doctors::find(session('logged_doctor'));
        if(!$doctor) {
            return redirect('/');
        }
        return view('Doctor.Appointments.index', [
            'doctor' => $doctor,
            'appointments' => $appointments
        ]);
    }
}
