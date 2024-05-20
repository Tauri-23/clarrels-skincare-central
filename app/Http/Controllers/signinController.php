<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Models\Doctors;
use App\Models\medical_information;
use App\Models\patients;
use Illuminate\Http\Request;

class signinController extends Controller
{
    protected $generateId;
    function __construct(IGenerateIdService $generateId) {
        $this->generateId = $generateId;
    }

    public function signinPatient(Request $request) {
        $patient = patients::where('username', $request->uname)
                       ->where('password', $request->pass)
                       ->first();
        if(!$patient) {
            $doctor = Doctors::where('username', $request->uname)
                    ->where('password', $request->pass)->first();
            
            if(!$doctor) {
                return response()->json([
                    'status' => 401,
                    'message' => 'error'
                ]);
            }
            else {
                $request->session()->put('logged_doctor', $doctor->id);
                return response()->json([
                    'status' => 201,
                    'message' => 'success'
                ]);
            }
        }
        else {
            $request->session()->put('logged_patient', $patient->id);
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
    }

    public function signupPatient(Request $request) {
        $patientId = $this->generateId->generate(patients::class, 6);
        $medicalInfoId = $this->generateId->generate(medical_information::class, 6);
        
        $patient = new patients;
        $patient->id = $patientId;
        $patient->firstname = $request->fname;
        $patient->middlename = $request->mname;
        $patient->lastname = $request->lname;
        $patient->username = $request->uname;
        $patient->password = $request->pass;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->birthdate = $request->bdate;
        $patient->gender = $request->gender;
        $patient->address = $request->address;
        $patient->pfp = 'default.png';

        if($patient->save()) {
            $medInfo = new medical_information;
            $medInfo->id = $medicalInfoId;
            $medInfo->patient = $patientId;

            $medInfo->allergies = $request->allergies;
            $medInfo->heart_disease = $request->heartDisease;
            $medInfo->high_blood_pressure = $request->hBlood;
            $medInfo->diabetic = $request->diabetic;
            $medInfo->surgeries = $request->surgeries;


            if($medInfo->save()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Account Created Successfully.'
                ]);
            }
            else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Something went wrong please try again later.'
                ]);
            }
            
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }

    public function logout() {
        auth()->logout();
        session()->flush();
        return redirect('/');
    }
}
