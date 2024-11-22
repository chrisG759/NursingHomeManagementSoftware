<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SignupAPI
{
    /**
     * Display the registration form.
     */
    public function index()
    {
        return view('signup');  // Return the signup view
    }

    /**
     * Handle the form submission for registration.
     */
    public function store(Request $request)
    {
       $employee = new Employees();
       
       $employee = [
            ''
       ]
    }
}
