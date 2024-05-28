<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Doctors;
use Illuminate\Http\Request;

class AdminDoctorController extends Controller
{
    public function index() {
        $doctors = Doctors::all();
        $admin = Admins::find(session('logged_admin'));

        if(!$admin) {
            return redirect('/');
        }

        return view('Admin.Doctor.index', [
            'doctors' => $doctors
        ]);
    }

    public function viewProfile($id) {
        $doctor = Doctors::find($id);
        $admin = Admins::find(session('logged_admin'));

        if(!$admin) {
            return redirect('/');
        }

        return view('Admin.Doctor.viewProfile', [
            'doctor' => $doctor
        ]);
    }


    public function editProfilePost(Request $request) {
        $doctor = Doctors::find($request->docId);
        $message = '';

        if($request->editType == 'name') {
            $doctor->firstname = $request->fname;
            $doctor->lastname = $request->lname;

            $message = "Doctor's name successfully changed";
        }
        elseif($request->editType == 'email') {
            $doctor->email = $request->email;

            $message = "Doctor's email successfully changed";
        }
        elseif($request->editType == 'phone') {
            $doctor->phone = $request->phone;

            $message = "Doctor's phone successfully changed";
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid request.'
            ]);
        }
        
        if($doctor->save()) {
            return response()->json([
                'status' => 200,
                'message' => $message
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
