<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function index() {
        $admin = Admins::find(session('logged_admin'));

        if(!$admin) {
            return redirect('/');
        }

        return view('Admin.index');
    }


    public function patients() {
        
    }
}
