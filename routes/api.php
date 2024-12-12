<?php

use App\Http\Controllers\AdminAPI;
use App\Http\Controllers\AdminReportAPI;
use App\Http\Controllers\CaregiverAPI;
use App\Http\Controllers\DoctorAPI;
use App\Http\Controllers\LoginAPI;
use App\Http\Controllers\Api\PatientApiController;
use App\Http\Controllers\Api\FamilyMemberApiController;
use App\Http\Controllers\EmployeesAPI;
use App\Http\Controllers\FamilyAPI;
use App\Http\Controllers\PatientAPI;
use App\Http\Controllers\PaymentAPI;
use App\Http\Controllers\RosterAPI;
use App\Http\Controllers\SignupAPI;
use App\Http\Controllers\SuperviorAPI;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewRosterController;

    Route::resource('login', LoginAPI::class);
    Route::resource('signup', SignupAPI::class);
    Route::resource('admin', AdminAPI::class);
    Route::resource('doctor', DoctorAPI::class);
    Route::resource('caregiver', CaregiverAPI::class);
    Route::resource('supervisor', SuperviorAPI::class);
    Route::resource('payment', PaymentAPI::class);
    Route::resource('roster', RosterAPI::class);
    Route::get('patient/{patientId}', [PatientApiController::class, 'getPatientDetails']);
    Route::get('appointment/details', [FamilyMemberApiController::class, 'getAppointmentDetails']);
    Route::resource('payment', PaymentAPI::class);
    Route::resource('adminReport', AdminReportAPI::class);
    Route::resource('employees', EmployeesAPI::class);
    Route::resource('patients', PatientAPI::class);
    Route::resource('family', FamilyAPI::class);
    Route::get('/roster-options', [NewRosterController::class, 'options']);
    Route::post('/rosters', [NewRosterController::class, 'store']);
