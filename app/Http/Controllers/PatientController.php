<?php

namespace App\Http\Controllers;

use App\Models\patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function dashboard() {
        $patient = patients::find(session('logged_patient'));
        if(!$patient) {
            return redirect('/');
        }
        return view('Patient.index', [
            'patient' => $patient
        ]);
    }
}
