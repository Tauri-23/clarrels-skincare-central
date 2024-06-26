<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\medical_information;
use App\Models\patients;
use App\Models\prescriptions;
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

    public function viewPatient($id, $page) {
        $patient = patients::find($id);
        $appointments = Appointments::with('doctors', 'patients', 'services')
                ->where('patient', $id)->where('doctor', session('logged_doctor'))
                ->where('status', "Pending")
                ->whereNotNull('patient')
                ->whereNotNull('service')
                ->whereNotNull('service_type')
                ->get();
        $appointmentRecords = Appointments::with('doctors', 'patients', 'services')
                ->where('patient', $id)->where('doctor', session('logged_doctor'))
                ->where('status', 'Completed')
                ->whereNotNull('patient')
                ->whereNotNull('service')
                ->whereNotNull('service_type')
                ->get();
        $doctor = Doctors::find(session('logged_doctor'));
        $medInfo = medical_information::where('patient', $id)->first();
        $prescriptions = prescriptions::all();

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
            'appointmentRecords' => $appointmentRecords,
            'medInfo' => $medInfo,
            'prescriptions' => $prescriptions,
            'page' => $page
        ]);
    }

    public function viewPatientPrescription($id) {
        $prescription = prescriptions::where('appointment', $id)->first();
        $appointment = Appointments::find($id);
        $doctor = Doctors::find(session('logged_doctor'));

        if(!$doctor) {
            return redirect('/');
        }

        return view('Doctor.Prescription.viewPrescription', [
            'doctor' => $doctor,
            'prescription' => $prescription,
            'appointment' => $appointment
        ]);
    }
}
