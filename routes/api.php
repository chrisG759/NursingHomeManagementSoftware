<?php

use App\Http\Controllers\AdminAPI;
use App\Http\Controllers\CaregiverAPI;
use App\Http\Controllers\DoctorAPI;
use App\Http\Controllers\LoginAPI;
use App\Http\Controllers\PatientAPI;
use App\Http\Controllers\SignupAPI;
use App\Http\Controllers\SuperviorAPI;
use Illuminate\Support\Facades\Route;
    

    Route::resource('login', LoginAPI::class);
    Route::resource('signup', SignupAPI::class);
    Route::resource('admin', AdminAPI::class);
    Route::resource('doctor', DoctorAPI::class);
    Route::resource('patient', PatientAPI::class);
    Route::resource('caregiver', CaregiverAPI::class);
    Route::resource('supervisor', SuperviorAPI::class);
    