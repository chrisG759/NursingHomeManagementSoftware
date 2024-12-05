<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SignupAPI
{
    /**
     * Display the registration form.
     */
    public function index()
    {
        return view('signup');
    }

    /**
     * Handle the form submission for registration.
     */
    public function store(Request $request)
    {
        DB::table('employees')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'salary' => null,
            'phoneNumber' => $request->phoneNumber,
            'isValid' => false,
            'checked' => false
        ]);

        return redirect(route('login.index'));
    }
}
