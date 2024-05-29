<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class landingPageController extends Controller
{
    public function index() {
        $doctors = Doctors::all();

        return view('index',[
            'doctors' => $doctors
        ]);
    }

    public function faqs() {
        $doctors = Doctors::all();

        return view('faqs',[
            'doctors' => $doctors
        ]);
    }
}
