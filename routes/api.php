<?php

use App\Http\Controllers\AdminAPI;
use App\Http\Controllers\DoctorAPI;
use App\Http\Controllers\LoginAPI;
use App\Http\Controllers\PatientAPI;
use App\Http\Controllers\SignupAPI;
use Illuminate\Support\Facades\Route;
    

    Route::resource('login', LoginAPI::class);
    Route::resource('signup', SignupAPI::class);
    Route::resource('admin', AdminAPI::class);
    Route::resource('doctor', DoctorAPI::class);
    Route::resource('patient', PatientAPI::class);

    

    use App\Http\Controllers\Api\PatientApiController;
use App\Http\Controllers\Api\FamilyMemberApiController;

Route::get('patient/{patientId}', [PatientApiController::class, 'getPatientDetails']);
Route::get('appointment/details', [FamilyMemberApiController::class, 'getAppointmentDetails']);
