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
    public function index(Request $request)
    {
        // Get the current date or the selected date from the request
        $currentDate = $request->query('date', date('Y-m-d'));
    
        // Fetch the supervisor based on the group_date
        $supervisor = DB::table('supervisors')
            ->where('group_date', $currentDate)
            ->first();
    
        if (!$supervisor) {
            return view('Roster', [
                'doctor' => null,
                'caregivers' => [],
                'supervisor' => null,
                'patientGroup' => null,
                'currentDate' => $currentDate,
            ])->with('error', 'No supervisor available for the selected date.');
        }
    
        // Use the supervisor's groupID to fetch the doctor
        $doctor = DB::table('doctors')
            ->where('groupID', $supervisor->groupID)
            ->first();
    
        // Use the supervisor's groupID to fetch the caregivers
        $caregivers = DB::table('caregivers')
            ->where('groupID', $supervisor->groupID)
            ->get();
    
        // Use the supervisor's groupID as the patient group
        $patientGroup = $supervisor->groupID;
    
        // Return the view with the data
        return view('Roster', [
            'doctor' => $doctor,
            'caregivers' => $caregivers,
            'supervisor' => $supervisor,
            'patientGroup' => $patientGroup,
            'currentDate' => $currentDate,
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
