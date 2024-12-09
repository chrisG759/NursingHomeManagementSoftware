<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController
{
    // Store a new medication
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $medication = new Medication();
        $medication->name = $request->name;
        $medication->type = $request->type;
        $medication->description = $request->description;
        $medication->save();

        return response()->json([
            'message' => 'Medication added successfully',
            'data' => $medication
        ], 201);
    }

    // Get all medications
    public function index()
    {
        $medications = Medication::all();
        return response()->json($medications);
    }

    // Show specific medication
    public function show($id)
    {
        $medication = Medication::find($id);

        if (!$medication) {
            return response()->json(['message' => 'Medication not found'], 404);
        }

        return response()->json($medication);
    }

    // Update a medication
    public function update(Request $request, $id)
    {
        $medication = Medication::find($id);

        if (!$medication) {
            return response()->json(['message' => 'Medication not found'], 404);
        }

        $medication->name = $request->name ?? $medication->name;
        $medication->type = $request->type ?? $medication->type;
        $medication->description = $request->description ?? $medication->description;
        $medication->save();

        return response()->json([
            'message' => 'Medication updated successfully',
            'data' => $medication
        ]);
    }

    // Delete a medication
    public function destroy($id)
    {
        $medication = Medication::find($id);

        if (!$medication) {
            return response()->json(['message' => 'Medication not found'], 404);
        }

        $medication->delete();

        return response()->json(['message' => 'Medication deleted successfully']);
    }
}
