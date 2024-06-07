<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateFilenameService;
use App\Contracts\IGenerateIdService;
use App\Models\Admins;
use App\Models\Doctors;
use Illuminate\Http\Request;

class AdminDoctorController extends Controller
{
    protected $generateId;
    protected $generateFileName;
    public function __construct(IGenerateIdService $generateId, IGenerateFilenameService $generateFileName)
    {
        $this->generateId = $generateId;
        $this->generateFileName = $generateFileName;
    }
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



    public function addDoctor() {
        $admin = Admins::find(session('logged_admin'));

        if(!$admin) {
            return redirect('/');
        }
        return view('Admin.Doctor.addDoctor');
    }

    public function addDoctorPost(Request $request) {
        $isEmailExist = Doctors::where('email', $request->email)->first();
        $isUserNameExist = Doctors::where('username', $request->uname)->first();
        $isPRCExist = Doctors::where('prc_number', $request->prc)->first();

        if($isEmailExist) {
            return response()->json([
                'status' => 400,
                'message' => 'Email already taken.'
            ]);
        }

        if($isUserNameExist) {
            return response()->json([
                'status' => 400,
                'message' => 'Username already taken.'
            ]);
        }

        if($isPRCExist) {
            return response()->json([
                'status' => 400,
                'message' => 'PRC Number already taken.'
            ]);
        }

        $doctor = new Doctors;

        if(!$request->hasFile('file')) {
            return response()->json([
                'status' => 401,
                'message' => 'No file uploaded'
            ]);
        }

        $file = $request->file('file');

        if(!$file->isValid()) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid file'
            ]);
        }

        try {
            $targetDirectory = 'assets/media/signatures';

            $newFilename = $this->generateFileName->generate($file, $targetDirectory);

            //upload the file to the public directory
            $file->move(public_path($targetDirectory), $newFilename);

            $doctor->signature = $newFilename;

        } catch(\Exception $ex) {
            return response()->json([
                'status' => 500,
                'message' =>'Failed to upload file: ' . $ex->getMessage()
            ]);
        }

        $doctor->id = $this->generateId->generate(Doctors::class, 6);
        $doctor->firstname = $request->fname;
        $doctor->lastname = $request->lname;
        $doctor->prc_number = $request->prc;
        $doctor->doctor_type = $request->doctorType;
        $doctor->username = $request->uname;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->password = $request->pass;
        $doctor->birthdate= $request->bdate;
        $doctor->gender = $request->gender;
        $doctor->address = $request->address;
        $doctor->pfp = 'default.png';

        if($doctor->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Doctor successfully added'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }

    public function deleteDoctorPost(Request $request) {
        $doctor = Doctors::find($request->id);

        if($doctor->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Doctor successfully deleted'
            ]);
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
