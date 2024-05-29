<?php

namespace App\Http\Controllers;

use App\Models\content_manage;
use App\Models\Doctors;
use App\Models\service;
use Illuminate\Http\Request;

class landingPageController extends Controller
{
    public function index() {
        $content1 = content_manage::find(1);
        $doctors = Doctors::all();

        return view('index',[
            'doctors' => $doctors,
            'content1' => $content1,
        ]);
    }

    public function faqs() {
        $doctors = Doctors::all();

        return view('faqs',[
            'doctors' => $doctors
        ]);
    }

    public function services() {
        $doctors = Doctors::all();
        $skinCareServices = service::where('service_type', '200000')->get();
        $dentalServices = service::where('service_type', '100000')->get();

        return view('services',[
            'doctors' => $doctors,
            'skinCareServices' => $skinCareServices,
            'dentalServices' => $dentalServices
        ]);
    }

    public function contacts() {
        $doctors = Doctors::all();

        return view('contact',[
            'doctors' => $doctors
        ]);
    }
}
