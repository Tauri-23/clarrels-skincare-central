<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateFilenameService;
use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    protected $generateFilename;

    public function __construct(IGenerateFilenameService $generateFilename) {
        $this->generateFilename = $generateFilename;
    }

    public function index() {
        $doctor = Doctors::find(session('logged_doctor'));

        if(!$doctor) {
            return redirect('/');
        }

        return view('Doctor.Profile.index', [
            'doctor' => $doctor
        ]);
    }

    public function editProfile() {
        $doctor = Doctors::find(session('logged_doctor'));

        if(!$doctor) {
            return redirect('/');
        }

        return view('Doctor.Profile.editProfile', [
            'doctor' => $doctor
        ]);
    }

    public function editProfilePost(Request $request) {
        $doctor = Doctors::find(session('logged_doctor'));
        $message = '';

        if($request->editType == "password") {
            $doctor->password = $request->value;
            $message = 'Password successfully changed';
        }
        elseif($request->editType == "PFP") {

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
                $targetDirectory = 'assets/media/pfp';
    
                $newFilename = $this->generateFilename->generate($file, $targetDirectory);
    
                //upload the file to the public directory
                $file->move(public_path($targetDirectory), $newFilename);

                $doctor->pfp = $newFilename;
    
            } catch(\Exception $ex) {
                return response()->json([
                    'status' => 500,
                    'message' =>'Failed to upload file: ' . $ex->getMessage()
                ]);
            }

            $message = 'PFP successfully changed';
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
