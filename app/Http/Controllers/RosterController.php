<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $doctor = DB::table('employees')
            ->where('employeeID', '=', $request->input('doctor'))
            ->first();
        
        $supervisor = DB::table('employees')
            ->where('employeeID', '=', $request->input('supervisor'))
            ->first();

        $caregiver1 = DB::table('employees')
        ->where('employeeID', '=', $request->input('caregiver_1'))
        ->first();

        $caregiver2 = DB::table('employees')
        ->where('employeeID', '=', $request->input('caregiver_2'))
        ->first();

        $caregiver3 = DB::table('employees')
        ->where('employeeID', '=', $request->input('caregiver_3'))
        ->first();

        $caregiver4 = DB::table('employees')
        ->where('employeeID', '=', $request->input('caregiver_4'))
        ->first();

        $groupID = DB::table('supervisors')
            ->where('employeeID', '=', $supervisor->employeeID)
            ->first();

        // Directly insert data into the database without validation
        DB::table('rosters')->insert([
            'date' => $request->input('date'),
            'supervisor' => $supervisor->first_name." ".$supervisor->last_name,
            'doctor' => $doctor->first_name." ".$doctor->last_name,
            'caregiver1' => $caregiver1->first_name." ".$caregiver1->last_name,
            'caregiver2' => $caregiver2->first_name." ".$caregiver2->last_name,
            'caregiver3' => $caregiver3->first_name." ".$caregiver3->last_name,
            'caregiver4' => $caregiver4->first_name." ".$caregiver4->last_name,
            'groupID' => $groupID->groupID
        ]);


        // Redirect after successful insertion
        return redirect()->route('create-roster')->with('success', 'Roster created successfully.');
    }
}
