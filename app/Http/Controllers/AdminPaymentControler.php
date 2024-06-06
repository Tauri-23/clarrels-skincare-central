<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Appointments;
use Illuminate\Http\Request;

class AdminPaymentControler extends Controller
{
    public function index($page) {
        $pendingPayments = Appointments::with('patients', 'doctors', 'services')
        ->where('status', 'To Pay')
        ->whereNotNull('patient')
        ->whereNotNull('doctor')
        ->get();
        $admin = Admins::find(session('logged_admin'));

        if(!$admin) {
            return redirect('/');
        }


        return view('Admin.Payment.index', [
            'pendingPayments' => $pendingPayments,
            'page' => $page
        ]);
    }
}
