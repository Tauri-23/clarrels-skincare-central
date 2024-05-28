<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Doctors;
use App\Models\patients;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function index() {
        $admin = Admins::find(session('logged_admin'));
        $doctors = Doctors::all();
        $patients = patients::inRandomOrder()->take(10)->get();

        if(!$admin) {
            return redirect('/');
        }

        return view('Admin.index', [
            'doctors' => $doctors,
            'patients' => $patients
        ]);
    }
}
