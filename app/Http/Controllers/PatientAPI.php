<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientAPI
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = DB::table('patients')
            ->get();

        return view('patients', ['patients' => $patients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = DB::table('patients')
            ->where('patientID', '=', $id)
            ->first();

        return view('editPatient', ['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('patients')
            ->where('patientID', '=', $id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'admission_date' => $request->admission_date,
                'phoneNumber' => $request->phoneNumber,
                'morning_medID' => $request->morning_medID,
                'afternoon_medID' => $request->afternoon_medID,
                'date_of_birth' => $request->date_of_birth,
                'emergency_contact' => $request->emergency_contact,
                'emergency_contact_relation' => $request->emergency_contact_relation,
                'familyID' => $request->familyID,
                'groupID' => $request->groupID,
                'payment' => $request->payment 
            ]);
            return redirect(route('patients.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('patients')
            ->where('patientID', '=', $id)
            ->delete();

        return redirect(route('patients.index'));
    }
}
