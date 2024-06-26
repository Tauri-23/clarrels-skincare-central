<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function dashboard() {
        $patient = patients::find(session('logged_patient'));
        $appointments = Appointments::with('services', 'doctors')
        ->where('patient', session('logged_patient'))
        ->where(function ($query) {
            $query->where('status', '!=', 'Rejected')
                ->where('status', '!=', 'Canceled')
                ->where('status', '!=', 'Completed');
        })
        ->whereNotNull('service')
        ->whereNotNull('service_type')
        ->get();
        if(!$patient) {
            return redirect('/');
        }
        return view('Patient.index', [
            'patient' => $patient,
            'appointments' => $appointments
        ]);
    }
}
