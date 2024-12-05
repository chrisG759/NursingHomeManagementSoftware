<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RosterAPI
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the doctor details based on doctorID (e.g., 2)
        $doctor = DB::table('doctors')
            ->where('doctorID', 2)
            ->first();

        // Get the caregivers for the same groupID as the doctor
        $caregivers = DB::table('caregivers')
            ->where('groupID', $doctor->groupID)
            ->get();

        // Get the supervisor details for the same groupID
        $supervisor = DB::table('supervisors')
            ->where('groupID', $doctor->groupID)
            ->first();

        // Get the patient group ID
        $patientGroup = $doctor->groupID;

        // Return the data to the view
        return view('Roster', [
            'doctor' => $doctor,
            'caregivers' => $caregivers,
            'supervisor' => $supervisor,
            'patientGroup' => $patientGroup
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implement storing if needed
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement show if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement updating if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implement destroy if needed
    }
}
