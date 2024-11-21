<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('homepage');
});

Route::get('/DoctorAppointment', function(){
    return view('DoctorAppointment');
});