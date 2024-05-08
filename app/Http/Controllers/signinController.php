<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
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
            return response()->json([
                'status' => 401,
                'message' => 'error'
            ]);
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
        $patient = new patients;
        $patient->id = $this->generateId->generate(patients::class, 6);
        $patient->firstname = $request->fname;
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
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
    }

    public function logout() {
        auth()->logout();
        session()->flush();
        return redirect('/');
    }
}
