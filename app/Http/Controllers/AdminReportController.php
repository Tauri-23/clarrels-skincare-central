<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\patients;
use App\Models\Receipts;
use App\Models\service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index() {
        $admin = Admins::find(session('logged_admin'));
        if(!$admin) {
            return redirect('/');
        }

        return view('Admin.GenerateReport.index', [
            'admin' => $admin
        ]);
    }


    public function generateReport($month, $year) {

        $month = intval($month);
        $year = intval($year);

        // Fetch patients where the created_at month is earlier or equal to the given month and matches the given year
        $patients = Patients::whereYear('created_at', $year)
            ->whereMonth('created_at', '<=', $month)
            ->get();

        $receipts = Receipts::with('appointments', 'appointments.doctors', 'appointments.patients')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', '<=', $month)
            ->get();
        
        $doctors = Doctors::whereYear('created_at', $year)
            ->whereMonth('created_at', '<=', $month)
            ->get();

        $services = service::whereYear('created_at', $year)
            ->whereMonth('created_at', '<=', $month)
            ->get();

        $appointments = Appointments::whereYear('created_at', $year)
            ->whereMonth('created_at', '<=', $month)
            ->get();

        return view('Admin.GenerateReport.GenerateReport', [
            'patients' => $patients,
            'doctors' => $doctors,
            'services' => $services,
            'appointments' => $appointments,
            'receipts' => $receipts,
            'month' => $month,
            'year' => $year
        ]);
    }
}
