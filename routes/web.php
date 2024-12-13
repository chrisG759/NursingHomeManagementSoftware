<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAPI;
use App\Http\Controllers\EmployeesAPI;
use App\Http\Controllers\PatientAppointmentControl;
use App\Http\Controllers\PaymentAPI;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\Api\NewRosterController;

Route::get('/roster', function () {
    return view('roster'); 
})->name('roster');

Route::get('/newRoster', function () {
    return view('newRoster'); 
})->name('newRoster');

Route::get('/', function(){
    return view('homepage');
});

Route::get('/DoctorAppointment', function(){
    return view('DoctorAppointment');
});

Route::get('/PatientHomepage', function(){
    return view('PatientHomepage');
});

Route::get('/admin/approval', [AdminAPI::class, 'index'])->name('admin.index');
Route::post('/admin/approveAll', [AdminAPI::class, 'approveAll'])->name('admin.approveAll');


Route::get('/payment', [PaymentAPI::class, 'index'])->name('payment.index');

// Route for searching the patient payment
Route::get('/search-payment', [PaymentAPI::class, 'search'])->name('payment.search');

// Route for submitting payment (if needed)
Route::post('/submit-payment', [PaymentAPI::class, 'store'])->name('payment.submit');

Route::get('/create-roster', [RosterController::class, 'create'])->name('create-roster');
Route::put('/push-roster', [RosterController::class, 'store'])->name('push-roster');

Route::get('/appointment-details', [PatientAppointmentControl::class, 'getAppointmentDetails'])->name('appointment-details');
Route::get('/patient-home', function(){
    return view('PatientHomepage');
});
Route::get('/make-appointment', [PatientAppointmentControl::class, 'makeAppointment'])->name('make-appointment');



