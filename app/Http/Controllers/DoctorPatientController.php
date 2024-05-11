<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
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

    public function viewPatient($id) {
        $patient = patients::find($id);
        $appointments = Appointments::where('patient', $id)->where('doctor', session('logged_doctor'))
                    ->where('status', "Pending")->get();
        $appointmentRecords = Appointments::where('patient', $id)->where('doctor', session('logged_doctor'))
                ->whereNot('status', "Pending")->get();
        $doctor = Doctors::find(session('logged_doctor'));
        if(!$doctor) {
            return redirect('/');
        }
        if(!$patient) {
            return redirect('/DoctorsPatients');
        }

        return view('Doctor.Patients.viewProfile', [
            'doctor' => $doctor,
            'patient' => $patient,
            'appointments' => $appointments,
            'appointmentRecords' => $appointmentRecords
        ]);
    }
}
