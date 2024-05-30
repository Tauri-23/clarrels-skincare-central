<?php

use App\Http\Controllers\AdminContentManagementController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\AdminPatientController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\DoctorAppointmentsController;
use App\Http\Controllers\DoctorDashController;
use App\Http\Controllers\DoctorFollowUpsController;
use App\Http\Controllers\DoctorPatientController;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\signinController;
use Illuminate\Support\Facades\Route;
/*
|----------------------------------------
| Public 
|----------------------------------------
*/
Route::get('/', [landingPageController::class , 'index']);
Route::get('/faqs', [landingPageController::class , 'faqs']);
Route::get('/services', [landingPageController::class, 'services']);
Route::get('/contacts', [landingPageController::class, 'contacts']);

// Signins
Route::get('/signinPatient', function() {
    return view('signins.index');
});
Route::get('/signupPatient', function() {
    return view('signins.create-patient');
});
Route::post('/signinPatientPost', [signinController::class, 'signinPatient']);
Route::post('/signupPatientPost', [signinController::class, 'signupPatient']);
Route::get('/logout', [signinController::class, 'logout']);

// Forgot Password
Route::post('/changePassPost', [signinController::class, 'changePassPost']);




/*
|----------------------------------------
| Patients 
|----------------------------------------
*/
// dashboard
Route::get('/PatientDash', [PatientController::class, 'dashboard']);


//Appointment
Route::get('/PatientAppointments', [AppointmentsController::class, 'appointments']);
Route::get('/bookAppointment', [AppointmentsController::class, 'bookAppointment']);
Route::post('/addAppointment', [AppointmentsController::class, 'bookAppointmentPost']);


//Profile
Route::get('/PatientProfile/{id}', [PatientProfileController::class, 'profile']);
Route::get('/PatientEditProfile/{id}', [PatientProfileController::class, 'editProfile']);
Route::post('/editPatientProfile', [PatientProfileController::class, 'editProfilePost']);
Route::post('/PatienteditMedicalInfo', [PatientProfileController::class, 'editMedInfoPost']);


// History
Route::get('/PatientHistory', [PatientHistoryController::class, 'history']);
Route::get('/ViewHistoryFull/{id}', [PatientHistoryController::class, 'viewHistory']);





/*
|----------------------------------------
| Doctors
|----------------------------------------
*/
Route::get('/DoctorDash', [DoctorDashController::class, 'doctorDash']);

// Patient pages
Route::get('/DoctorsPatients', [DoctorPatientController::class, 'index']);
Route::get('/DoctorViewPatient/{id}', [DoctorPatientController::class, 'viewPatient']);

// Appointment Pages
Route::get('/DoctorsAppointments/{activeStatus}', [DoctorAppointmentsController::class, 'index']);
Route::post('/changeStatusAppointment', [DoctorAppointmentsController::class, 'changeStatus']);
Route::post('/cancelFollowUpAppointment', [DoctorAppointmentsController::class, 'cancelFollowUpPost']);

// Followup Appointments
// Route::get('/DoctorsFollowUpAppointments/{activeLink}', [DoctorFollowUpsController::class, 'index']);
Route::get('/addFollowupAppointment/{id}', [DoctorFollowUpsController::class, 'bookFollowUp']);
route::post('/addFollowupAppointmentPost', [DoctorFollowUpsController::class, 'bookFollowUpPost']);

// Profile
Route::get('/DoctorProfile', [DoctorProfileController::class, 'index']);
Route::get('/DoctorEditProfile', [DoctorProfileController::class, 'editProfile']);
Route::post('/editDoctorProfile', [DoctorProfileController::class, 'editProfilePost']);





/*
|----------------------------------------
| Admin
|----------------------------------------
*/
Route::get('/AdminDash', [AdminDashController::class, 'index']);

// Patients
Route::get('/AdminPatients', [AdminPatientController::class, 'index']);
Route::get('/AdminPatients/{id}', [AdminPatientController::class, 'viewProfile']);
Route::post('/AdminDeletePatientPost', [AdminPatientController::class, 'deletePatient']);

// Doctors
Route::get('/AdminDoctors', [AdminDoctorController::class, 'index']);
Route::get('/AdminViewDoctorProfile/{id}', [AdminDoctorController::class, 'viewProfile']);
Route::post('/adminEditDoctorProfile', [AdminDoctorController::class, 'editProfilePost']);

// Content management
Route::get('/ContentManagement', [AdminContentManagementController::class, 'index']);

Route::post('/EditHomeContent', [AdminContentManagementController::class, 'editContentPost']);
Route::post('/EditWhyClarrels', [AdminContentManagementController::class, 'editWhyClarrels']);
Route::post('/editFaqs', [AdminContentManagementController::class, 'editFaqsPost']);
Route::post('/addFaqs', [AdminContentManagementController::class, 'addFaqsPost']);
Route::post('/delFaqs', [AdminContentManagementController::class, 'delFaqsPost']);
Route::post('/editService', [AdminContentManagementController::class, 'editServicePost']);
Route::post('/AddService', [AdminContentManagementController::class, 'addServicePost']);
Route::post('/delService', [AdminContentManagementController::class, 'delServicePost']);