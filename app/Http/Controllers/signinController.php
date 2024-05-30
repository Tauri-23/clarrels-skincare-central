<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Contracts\IGenerateOTPService;
use App\Contracts\ISendEmailService;
use App\Mail\forgotPasswordOTPMail;
use App\Models\Admins;
use App\Models\Doctors;
use App\Models\email_verifications;
use App\Models\medical_information;
use App\Models\patients;
use Carbon\Carbon;
use Illuminate\Http\Request;

class signinController extends Controller
{
    protected $generateId;
    protected $sendEmail;
    protected $generateOTP;
    function __construct(IGenerateIdService $generateId, ISendEmailService $sendEmail, IGenerateOTPService $generateOTP) {
        $this->generateId = $generateId;
        $this->sendEmail = $sendEmail;
        $this->generateOTP = $generateOTP;
    }

    public function signinPatient(Request $request) {
        $patient = patients::where('username', $request->uname)
            ->where('password', $request->pass)
            ->first();
        $doctor = Doctors::where('username', $request->uname)
            ->where('password', $request->pass)->first();
        $admin = Admins::where('username', $request->uname)
            ->where('password', $request->pass)->first();
            
        if($patient) {
            $request->session()->put('logged_patient', $patient->id);
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);            
        }
        if($doctor) {
            $request->session()->put('logged_doctor', $doctor->id);
            return response()->json([
                'status' => 201,
                'message' => 'success'
            ]);
            
        }
        if($admin) {
            $request->session()->put('logged_admin', $admin->id);
            return response()->json([
                'status' => 202,
                'message' => 'success'
            ]);
            
        }


        return response()->json([
            'status' => 401,
            'message' => 'error'
        ]);
    }

    public function signupPatient(Request $request) {
        $patientId = $this->generateId->generate(patients::class, 6);
        $medicalInfoId = $this->generateId->generate(medical_information::class, 6);
        
        $existpatientUname = patients::where('username', $request->uname)->first();
        $existPatientEmail = patients::where('email', $request->email)->first();

        if($existpatientUname) {
            return response()->json([
                'status' => 400,
                'message' => 'Username already exist.'
            ]);
        }
        if($existPatientEmail) {
            return response()->json([
                'status' => 400,
                'message' => 'Email already exist.'
            ]);
        }

        
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


    public function changePassPost(Request $request) {
        if($request->type == 'sendOTP') {
            // Check if account existing
            $isExist = patients::where('email', $request->email)->first();

            if(!$isExist) {
                return response()->json([
                    'status' => 400,
                    'message' => "Account with email ".$request->email." doesn't exist"
                ]);
            }


            $otp = $this->generateOTP->generate(6);
            $this->sendEmail->send(new forgotPasswordOTPMail($otp), $request->email);

            $emailVerification = new email_verifications;
            $emailVerification->email = $request->email;
            $emailVerification->otp = $otp;

            $emailVerification->save();

            return response()->json([
                'status' => 200,
                'message' => 'OTP has been Sent to your email.'
            ]);
        }
        else if($request->type == 'checkOTP') {
            $verification = email_verifications::where('otp', $request->otp)->first();

            if(!$verification) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Wrong OTP'
                ]);
            }

            else {
                $currentTime = Carbon::now();
                $time = $verification->created_at;
    
                // Calculate the time difference in seconds
                $timeDifference = $currentTime->diffInSeconds($time);
    
                // Check if the time difference is less than 5 minutes (300 seconds)
                if ($timeDifference <= 300) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'success'
                    ]);
                } else {
                    return response()->json([
                        'status' => 401,
                        'message' => 'OTP Expired'
                    ]);
                }
            
            }
        }

        else if($request->type == 'changePass') {
            $patient = patients::where('email', $request->email)->first();
            
            if($patient->password == $request->password) {
                return response()->json([
                    'status' => 400,
                    'message' => 'New password cannot be your old password.'
                ]);
            }

            $patient->password = $request->password;

            if($patient->save()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Password successfully change please login again.'
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

    public function logout() {
        auth()->logout();
        session()->flush();
        return redirect('/');
    }
}
