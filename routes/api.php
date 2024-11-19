<?php

use App\Http\Controllers\LoginAPI;
use App\Http\Controllers\SignupAPI;
use Illuminate\Support\Facades\Route;
    

    Route::resource('login', LoginAPI::class);
    Route::resource('signup', SignupAPI::class);

    