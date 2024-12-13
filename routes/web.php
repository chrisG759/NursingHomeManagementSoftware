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

Route::prefix('patient')->group(function () {
    Route::get('/', function () {
        return view('patient.homepage');
    })->name('patient.homepage');

    Route::get('/appointment', function () {
        return view('patient.appointment');
    })->name('patient.appointment');

    Route::get('/payment', function () {
        return view('patient.payment');
    })->name('patient.payment');
});

Route::prefix('admin')->group(function () {
    Route::get('/report', function () {
        return view('admin.report');
    })->name('admin.report');

    Route::get('/registration-approval', function () {
        return view('admin.registration-approval');
    })->name('admin.registration-approval');

    Route::get('/roster', function () {
        return view('admin.roster');
    })->name('admin.roster');

    Route::get('/employees', function () {
        return view('admin.employees');
    })->name('admin.employees');
});

Route::prefix('doctor')->group(function () {
    Route::get('/', function () {
        return view('doctor.home');
    })->name('doctor.home');

    Route::get('/appointment', function () {
        return view('doctor.appointment');
    })->name('doctor.appointment');

    Route::get('/roster', function () {
        return view('doctor.roster');
    })->name('doctor.roster');

    Route::get('/medications', function () {
        return view('doctor.medications');
    })->name('doctor.medications');
});

Route::prefix('caregiver')->group(function () {
    Route::get('/', function () {
        return view('caregiver.home');
    })->name('caregiver.home');

    Route::get('/roster', function () {
        return view('caregiver.roster');
    })->name('caregiver.roster');
});

Route::prefix('family')->group(function () {
    Route::get('/home', function () {
        return view('family.home');
    })->name('family.home');

    Route::get('/payment', function () {
        return view('family.payment');
    })->name('family.payment');
});

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



