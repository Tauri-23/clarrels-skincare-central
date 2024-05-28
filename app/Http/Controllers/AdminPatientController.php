<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\medical_information;
use App\Models\patients;
use Illuminate\Http\Request;

class AdminPatientController extends Controller
{
    public function index() {
        $patients = patients::all();
        $admin = Admins::find(session('logged_admin'));

        if(!$admin) {
            return redirect('/');
        }

        return view('Admin.Patient.index', [
            'patients' => $patients
        ]);
    }

    public function viewProfile($id) {
        $patient = patients::find($id);
        $medInfo = medical_information::where('patient', $id)->first();
        $admin = Admins::find(session('logged_admin'));

        if(!$admin) {
            return redirect('/');
        }

        return view('Admin.Patient.viewProfile', [
            'patient' => $patient,
            'medInfo' => $medInfo
        ]);
    }

    public function deletePatient(Request $request) {
        $patient = patients::find($request->patientId);
        $admin = Admins::find(session('logged_admin'));

        if(!$admin) {
            return redirect('/');
        }

        if($patient->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Patient successfully deleted.'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }
}
