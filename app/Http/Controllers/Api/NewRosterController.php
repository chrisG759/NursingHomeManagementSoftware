<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roster;

class NewRosterController extends Controller
{
    public function options()
    {
        return response()->json([
            'supervisors' => User::where('role', 'supervisor')->select('id', 'name')->get(),
            'doctors' => User::where('role', 'doctor')->select('id', 'name')->get(),
            'caregivers' => User::where('role', 'caregiver')->select('id', 'name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'supervisor_id' => 'required',
            'doctor_id' => 'required',
        ]);

        NewRoster::create($request->all());

        return response()->json(['message' => 'Roster created successfully.'], 201);
    }
}