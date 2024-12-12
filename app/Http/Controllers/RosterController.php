<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RosterController
{
    // Render the form for creating a roster
    public function create()
    {
        $doctors = DB::table('employees')
            ->where('isValid', '=', '1')
            ->where('role', '=', 'Doctor')
            ->get();

        $caregivers = DB::table('employees')
            ->where('isValid', '=', '1')
            ->where('role', '=', 'Caregiver')
            ->get();

        $supervisors = DB::table('employees')
            ->where('isValid', '=', '1')
            ->where('role', '=', 'Supervisor')
            ->get();

        return view('newRoster', [
            'doctors' => $doctors,
            'supervisors' => $supervisors,
            'caregivers' => $caregivers
        ]);
    }

    // Store the roster details
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'date' => 'required|date',
        //     'doctor' => 'required|exists:employees,employeeID',
        //     'supervisor' => 'required|exists:employees,employeeID',
        //     'caregiver1' => 'required|exists:employees,employeeID',
        //     'caregiver2' => 'nullable|exists:employees,employeeID',
        //     'caregiver3' => 'nullable|exists:employees,employeeID',
        //     'caregiver4' => 'nullable|exists:employees,employeeID',
        // ]);

        // // Fetch employee names based on their IDs
        // $doctor = DB::table('employees')
        //     ->where('employeeID', $validated['doctor'])
        //     ->where('isValid', '=', '1')
        //     ->value(DB::raw("CONCAT(first_name, ' ', last_name)"));
        
        // $supervisor = DB::table('employees')
        //     ->where('employeeID', $validated['supervisor'])
        //     ->where('isValid', '=', '1')
        //     ->value(DB::raw("CONCAT(first_name, ' ', last_name)"));
        
        // $caregiver1 = DB::table('employees')
        //     ->where('employeeID', $validated['caregiver1'])
        //     ->where('isValid', '=', '1')
        //     ->value(DB::raw("CONCAT(first_name, ' ', last_name)"));
        
        // $caregiver2 = $validated['caregiver2']
        //     ? DB::table('employees')
        //         ->where('employeeID', $validated['caregiver2'])
        //         ->where('isValid', '=', '1')
        //         ->value(DB::raw("CONCAT(first_name, ' ', last_name)"))
        //     : null;
        
        // $caregiver3 = $validated['caregiver3']
        //     ? DB::table('employees')
        //         ->where('employeeID', $validated['caregiver3'])
        //         ->where('isValid', '=', '1')
        //         ->value(DB::raw("CONCAT(first_name, ' ', last_name)"))
        //     : null;
        
        // $caregiver4 = $validated['caregiver4']
        //     ? DB::table('employees')
        //         ->where('employeeID', $validated['caregiver4'])
        //         ->where('isValid', '=', '1')
        //         ->value(DB::raw("CONCAT(first_name, ' ', last_name)"))
        //     : null;

        // // Fetch the supervisor's groupID from the supervisors table
        // $groupID = DB::table('supervisors')
        //     ->where('supervisorID', $validated['supervisor'])
        //     ->value('groupID');

        // // Insert the names into the rosters table
        // DB::table('rosters')->insert([
        //     'date' => $validated['date'],
        //     'doctor' => $doctor,
        //     'supervisor' => $supervisor,
        //     'caregiver1' => $caregiver1,
        //     'caregiver2' => $caregiver2,
        //     'caregiver3' => $caregiver3,
        //     'caregiver4' => $caregiver4,
        //     'groupID' => $groupID,  // Use the groupID from the supervisors table
        // ]);

        // return redirect()->route('create-roster')->with('success', 'Roster created successfully!');
        return dd($request->all());
    }
}
