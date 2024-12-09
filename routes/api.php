<?php

use App\Http\Controllers\AdminAPI;
use App\Http\Controllers\AdminReportAPI;
use App\Http\Controllers\CaregiverAPI;
use App\Http\Controllers\DoctorAPI;
use App\Http\Controllers\LoginAPI;
use App\Http\Controllers\Api\PatientApiController;
use App\Http\Controllers\Api\FamilyMemberApiController;
use App\Http\Controllers\PaymentAPI;
use App\Http\Controllers\RosterAPI;
use App\Http\Controllers\SignupAPI;
use App\Http\Controllers\SuperviorAPI;
use Illuminate\Support\Facades\Route;
    

    Route::resource('login', LoginAPI::class);
    Route::resource('signup', SignupAPI::class);
    Route::resource('admin', AdminAPI::class);
    Route::resource('doctor', DoctorAPI::class);
    Route::resource('patient', PatientApiController::class);
    Route::resource('caregiver', CaregiverAPI::class);
    Route::resource('supervisor', SuperviorAPI::class);
    Route::resource('payment', PaymentAPI::class);
    Route::resource('roster', RosterAPI::class);
    Route::get('patient/{patientId}', [PatientApiController::class, 'getPatientDetails']);
    Route::get('appointment/details', [FamilyMemberApiController::class, 'getAppointmentDetails']);
    Route::resource('payment', PaymentAPI::class);
    Route::resource('adminReport', AdminReportAPI::class);
    
