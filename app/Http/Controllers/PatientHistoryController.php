<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\patients;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    //
    public function history() {
        $patient = patients::find(session('logged_patient'));
        return view('Patient.History.index', [
            'history' => Appointments::where('patient', session('logged_patient'))
                ->where('status', 'Done')
                ->orderBy('created_at', 'DESC')->get(),
            'patient' => $patient
        ]);
    }
}
