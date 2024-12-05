<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentAPI
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payments');
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
    public function show(string $id, Request $request)
    {
        $patient = $request->validate([
            'patientID' => 'patientID'
        ]);
        $patientPayment = DB::table('payments')
            ->select('total_due')
            ->where('patientID', $patient)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
