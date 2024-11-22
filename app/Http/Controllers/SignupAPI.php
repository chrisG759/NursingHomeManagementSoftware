<?php

namespace App\Http\Controllers;

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
        $validate = [
            $request->all();
        ];
    }
}
