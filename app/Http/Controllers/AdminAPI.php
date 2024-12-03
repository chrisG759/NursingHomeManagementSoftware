<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAPI
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = DB::table('employees')->where(function($query){
            $query->where('checked', 0)
                    ->orWhere('checked', false);
        })->get();


        return view('registrationApproval', ['employees' => $employees]);
    }

    public function approveAll(Request $request)
    {
        // Validate the incoming request to ensure approval is selected for each employee
        $validated = $request->validate([
            'employees' => 'required|array',
            'employees.*.approval' => 'required|in:yes,no',
            'employees.*.employeeID' => 'required|exists:employees,employeeID',  // Ensure employeeID is validated
        ]);
    
        // Loop through each employee and update their approval status
        foreach ($validated['employees'] as $employeeData) {
            $isValid = ($employeeData['approval'] === 'yes') ? true : false;
    
            // Update the employee's 'checked' and 'isValid' columns
            DB::table('employees')
                ->where('employeeID', $employeeData['employeeID'])  // Use employeeID for updating
                ->update([
                    'checked' => true,        // Set checked to true
                    'isValid' => $isValid     // Set isValid to true or false
                ]);
        }
    
        // Redirect back to the registration approval page with a success message
        return redirect()->route('admin.index')
                        ->with('success', 'Employee registrations updated successfully.');
    }
    
     



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
