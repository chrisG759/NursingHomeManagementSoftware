<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Post;

use function Pest\Laravel\post;

class LoginAPI
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_COOKIE['userInfo'])){
            $employee = DB::table('employees')
            ->where('email', $_COOKIE['userInfo'])
            ->first();

            if($employee){
                if($employee->role == 'Admin'){
                    return redirect(route('admin.index'));
                } else if($employee->role == 'Doctor'){
                    return redirect(route('doctor.index'));
                } else if($employee->role == 'Patient'){
                    return redirect(route('patient.index'));
                }
            }
        }

        $_POST['loginInvalid'] = false;
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $employee = DB::table('employees')
            ->where('email', $validated['email'])
            ->first();


        if ($employee && ($validated['password'] == $employee->password) && $employee->isValid == true){

            if ($request->has('remember')) {
                setcookie('userInfo', $validated['email'], time() + (86400), "/"); 
            }


            
            if($employee->role == 'Doctor'){
                return redirect(route('doctor.index'));
            } else if($employee->role == 'Patient'){
                return redirect(route('patient.index'));
            } else if($employee->role == 'Caregiver'){
                return redirect(route('caregiver.index'));
            } else if($employee->role == 'Supervisor'){
                return redirect(route('supervisor.index'));
            }
        } else {
            if($employee->role == 'Admin'){
                return redirect(route('admin.index'));
            } else{
                $_POST['loginInvalid'] = true;
                return view('login');
            }
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
