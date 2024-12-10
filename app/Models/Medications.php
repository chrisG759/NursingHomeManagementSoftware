<?php
namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
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

        return redirect()->route('medications.index')->with('success', 'Medication added successfully.');
    }

    public function index()
    {
        $medications = Medication::all();
        return view('medications.index', compact('medications'));
    }

    public function edit($id)
    {
        $medication = Medication::findOrFail($id);
        return view('medications.edit', compact('medication'));
    }

    public function update(Request $request, $id)
    {
        $medication = Medication::findOrFail($id);
        
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
