<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    //
    public function history() {
        return view('Patient.History.index', [
            'history' => Appointments::where('patient', session('logged_patient'))
                ->where('status', 'Done')
                ->orderBy('created_at', 'DESC')->get()
        ]);
    }
}
