<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateFilenameService;
use App\Models\Appointments;
use App\Models\medical_information;
use App\Models\patients;
use Illuminate\Http\Request;

class PatientProfileController extends Controller
{
    protected $generateFilename;

    public function __construct(IGenerateFilenameService $generateFilename) {
        $this->generateFilename = $generateFilename;
    }
    
    public function profile($id) {
        $appointments = Appointments::with('doctors', 'patients', 'services')
        ->where('patient', $id)->where('status', 'Pending')
        ->orderBy('created_at', 'ASC')->get();

        $history = Appointments::where('patient', session('logged_patient'))
        ->where('status', 'Completed')
        ->orderBy('created_at', 'ASC')->get();

        $medInfo = medical_information::where('patient', $id)->first();

        return view('Patient.Profile.index', [
            "patient" => patients::find($id),
            "appointments" => $appointments,
            "medInfo" => $medInfo,
            'history' => $history,
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
            $patient->middlename = $request->mname;
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
        elseif($request->editType == "Address") {
            $patient->address = $request->address;
        }
        elseif($request->editType == "PFP") { //Uplodad file and save filename to db

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
    
                $filePath = '/' . $targetDirectory . '/' . $newFilename;

                $patient->pfp = $newFilename;
    
            } catch(\Exception $ex) {
                return response()->json([
                    'status' => 500,
                    'message' =>'Failed to upload file: ' . $ex->getMessage()
                ]);
            }
            
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
