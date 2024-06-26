<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\patients;
use App\Models\prescriptions;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    //
    public function history() {
        $patient = patients::find(session('logged_patient'));
        return view('Patient.History.index', [
            'history' => Appointments::where('patient', session('logged_patient'))
                ->where('status', 'Completed')
                ->whereNotNull('service')
                ->whereNotNull('service_type')
                ->orderBy('created_at', 'ASC')->get(),
            'patient' => $patient
        ]);
    }

    public function viewHistory($id) {
        $patient = patients::find(session('logged_patient'));
        $prescriptions = prescriptions::all();
        $doctor = Doctors::find($id);
        return view('Patient.History.viewHistory', [
            'history' => Appointments::with('doctors', 'patients', 'services')
                ->where('patient', session('logged_patient'))
                ->where('status', 'Completed')->where('doctor', $id)
                ->whereNotNull('service')
                ->whereNotNull('service_type')
                ->orderBy('created_at', 'ASC')->get(),
            'prescriptions' => $prescriptions,
            'patient' => $patient,
            'doctor' => $doctor
        ]);
    }
}
