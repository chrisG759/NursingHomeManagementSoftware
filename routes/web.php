<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAPI;
use App\Http\Controllers\PaymentAPI;

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
