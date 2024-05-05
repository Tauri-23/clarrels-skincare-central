<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\patients;
use Illuminate\Http\Request;

class PatientProfileController extends Controller
{
    
    public function profile($id) {
        return view('Patient.Profile.index', [
            "patient" => patients::find($id),
            "appointments" => Appointments::where('patient', $id)->get()
        ]);
    }
}
