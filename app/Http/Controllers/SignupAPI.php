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
        if ($request->role == "patient"){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('patients')->insert([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'admission_date' => null,
                'morning_medID' => null,
                'afternoon_medID' => null,
                'night_medID' => null,
                'date_of_birth' => $request->date_of_birth,
                'emergency_contact' => $request->emergency_contact,
                'emergency_contact_relation' => $request->emergency_contact_relation,
                'familyID' => $request->family_code,
                'groupID' => null,
                'payment' => null
            ]);  
            redirect(route('login.index')); 
        } else {
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
}
