<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\patients;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorDashController extends Controller
{
    public function doctorDash() {
        $today = Carbon::now()->toDateString();
        $patients = patients::all();
        $appointments = Appointments::with('services', 'patients')
            ->where('doctor', session('logged_doctor'))
            ->where(function ($query) {
                $query->where('status', '!=', 'Rejected')
                    ->where('status', '!=', 'Canceled')
                    ->where('status', '!=', 'Completed');
            })
            ->whereNotNull('patient')
            ->whereNotNull('service')
            ->whereNotNull('service_type')
            ->get();

        $todayAppointment = Appointments::where('appointment_date', $today)
            ->where('doctor', session('logged_doctor'))
            ->where(function ($query) {
            $query->where('status', '!=', 'Rejected')
                ->where('status', '!=', 'Canceled')
                ->where('status', '!=', 'Completed');
            })
            ->whereNotNull('patient')
            ->whereNotNull('service')
            ->whereNotNull('service_type')
            ->get();

        $totalAppointments = Appointments::where('doctor', session('logged_doctor'))
            ->where(function ($query) {
            $query->where('status', '!=', 'Rejected')
                ->where('status', '!=', 'Canceled');
            })
            ->whereNotNull('patient')
            ->whereNotNull('service')
            ->whereNotNull('service_type')
            ->get();

        $doctor = Doctors::find(session('logged_doctor'));

        if(!$doctor) {
            return redirect('/');
        }
        return view('Doctor.index', [
            'doctor' => $doctor,
            'appointments' => $appointments,
            'patients' => $patients,
            'appointment_today' => $todayAppointment,
            'totalAppointments' => $totalAppointments
        ]);
    }
}
