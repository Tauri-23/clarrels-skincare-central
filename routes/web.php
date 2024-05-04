<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\signinController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Signins
Route::get('/signinPatient', function() {
    return view('signins.index');
});
Route::get('/signupPatient', function() {
    return view('signins.create-patient');
});
Route::post('/signinPatientPost', [signinController::class, 'signinPatient']);
Route::post('/signupPatientPost', [signinController::class, 'signupPatient']);




// Patients
// dashboard
Route::get('/PatientDash', [PatientController::class, 'dashboard']);



//Appointment
Route::get('/PatientAppointments', [AppointmentsController::class, 'appointments']);
Route::get('/bookAppointment', [AppointmentsController::class, 'bookAppointment']);
Route::post('/addAppointment', [AppointmentsController::class, 'bookAppointmentPost']);