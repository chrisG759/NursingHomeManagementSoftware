<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Support\Facades\DB;

class EmployeesAPI
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchEmployee = DB::table('employees')
            ->where('first_name', '=', $request->searchedEmployee)
            ->where('isValid', '=', '1')
            ->first();

        $employees = DB::table('employees')
            ->select('employeeID', 'first_name', 'last_name', 'email', 'password', 'role', 'salary')
            ->where('isValid', '=', '1')
            ->get();

        return view('employees', ['employees' => $employees, 'searchEmployee' => $searchEmployee]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function searchEmployee(Request $request){
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = DB::table('employees')
            ->where('employeeID', '=', $id)
            ->first();

        return view('modifyEmployee', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('employees')
            ->where('employeeID', '=', $id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'salary' => $request->salary
            ]);
        
            return redirect(route('employees.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('employees')
            ->where('employeeID', '=', $id)
            ->delete();


        return redirect(route('employees.index'));
    }
}
