<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\patients;
use Illuminate\Http\Request;

class DoctorPatientController extends Controller
{
    public function index() {
        $patients = patients::all();
        $doctor = Doctors::find(session('logged_doctor'));
        if(!$doctor) {
            return redirect('/');
        }
        return view('Doctor.Patients.index', [
            'doctor' => $doctor,
            'patients' => $patients
        ]);
    }
}
