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
    
        $rosterRecord = DB::table('rosters')
            ->where('date', '=', $currentDate)
            ->get();

        return view('Roster', ['rosterRecord' => $rosterRecord, 'currentDate' => $currentDate]);
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
        
    }
}
