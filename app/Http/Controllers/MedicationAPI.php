<?php
namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicationController 
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $medication = $request->validate([
            'medName' =>  $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('medications.index')->with('success', 'Medication added successfully.');
    }

    public function index()
    {
        return view('medications.index', compact('medications'));
    }

    public function show()
    {
    
    }

    public function update(Request $request, $id)
    {
        $medication=DB::table('medication');
        
        $medication->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return redirect()->route('medications.index')->with('success', 'Medication updated successfully.');
    }

    public function destroy($id)
    {
        $medication = Medication::findOrFail($id);
        $medication->delete();

        return redirect()->route('medications.index')->with('success', 'Medication deleted successfully.');
    }
}
