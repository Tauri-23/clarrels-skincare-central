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

class AdminDashController extends Controller
{
    public function index() {
        $admin = Admins::find(session('logged_admin'));
        $doctors = Doctors::all();
        $patients = patients::inRandomOrder()->take(10)->get();

        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        $receipts = Receipts::with('appointments', 'appointments.doctors', 'appointments.patients')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', '<=', $month)
            ->get();

        $services = service::whereYear('created_at', $year)
            ->whereMonth('created_at', '<=', $month)
            ->get();

        $appointments = Appointments::whereYear('created_at', $year)
            ->whereMonth('created_at', '<=', $month)
            ->get();


        // Total Sales Per Month
        $totalSalesPerMonth = array_fill(0, $month, 0); // Initialize array with 0s

        foreach ($receipts as $receipt) {
            $receiptMonth = $receipt->created_at->month;
            if ($receiptMonth <= $month) {
                $totalSalesPerMonth[$receiptMonth - 1] += $receipt->service_price;
            }
        }


        // Total Sales per Service
        $totalSalePerService = [];
        foreach($services as $service) {
            $totalIncome = 0;
                    $totalAppointments = 0;
                    foreach ($receipts as $receipt) {
                        if($receipt->appointments()->first()->service == $service->id) {
                            $totalIncome += $receipt->service_price;
                        }
                    }

                    foreach ($appointments as $appointment) {
                        if($appointment->service == $service->id) {
                            $totalAppointments ++;
                        }
                    }

                    $totalSalePerService[] = $totalIncome;
        }

        if(!$admin) {
            return redirect('/');
        }

        return view('Admin.index', [
            'doctors' => $doctors,
            'month' => $month,
            'totalSalesPerMonth' => $totalSalesPerMonth,
            'receipts' => $receipts,
            'services' => $services,
            'totalSalePerService' => $totalSalePerService,
            'patients' => $patients
        ]);
    }
}
