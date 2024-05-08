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

    public function editProfile($id) {
        return view('Patient.Profile.edit-profile', [
            "patient" => patients::find($id)
        ]);
    }

    public function editProfilePost(Request $request) {
        $patient = patients::find($request->patId);

        if($request->editType == "Name") {
            $patient->firstname = $request->fname;
            $patient->lastname = $request->lname;
        }
        elseif($request->editType == "Email") {
            $patient->email = $request->email;
        }
        elseif($request->editType == "Phone") {
            $patient->phone = $request->phone;
        }
        elseif($request->editType == "Password") {
            $patient->password = $request->password;
        }

        if($patient->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'error'
            ]);
        }
    }
}
