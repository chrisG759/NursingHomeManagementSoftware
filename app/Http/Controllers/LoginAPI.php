<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginAPI 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_COOKIE['userInfo'])) {
            $employee = DB::table('employees')
                ->where('email', $_COOKIE['userInfo'])
                ->first();

            if ($employee) {
                if ($employee->role == 'Admin') {
                    return redirect(route('admin.index'));
                } elseif ($employee->role == 'Doctor') {
                    return redirect(route('doctor.index'));
                } elseif ($employee->role == 'Patient') {
                    return redirect(route('patient.index'));
                }
            }
        }

        return view('login', ['loginInvalid' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $family = DB::table('families')
            ->where('username', '=', $request->email)
            ->first();

        $employee = DB::table('employees')
            ->where('email', '=', $request->email)
            ->first();

        if ($employee && ($validated['password'] == $employee->password) && $employee->isValid == true) {

            if ($request->has('remember')) {
                setcookie('userInfo', $validated['email'], time() + 86400, "/");
            }

            if ($employee->role == 'Doctor') {
                return redirect(route('doctor.index'));
            } elseif ($employee->role == 'Patient') {
                return redirect(route('patient.index'));
            } elseif ($employee->role == 'Caregiver') {
                return redirect(route('caregiver.index'));
            } elseif ($employee->role == 'Supervisor') {
                return redirect(route('supervisor.index'));
            } elseif ($employee->role == 'Admin') {
                return redirect(route('admin.index'));
            }
        } elseif ($family && ($request->password == $family->password)) {
            return redirect(route('family.index'));
        }

        return view('login', ['loginInvalid' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement show method if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement update method if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implement destroy method if needed
    }
}
