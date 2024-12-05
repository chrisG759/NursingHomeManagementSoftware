<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Step 1: Validate the payment input
        $request->validate([
            'patientId' => 'required|exists:patients,patientID', // Ensure the patient exists
            'paymentAmount' => 'required|numeric|min:0', // Ensure paymentAmount is valid
        ]);

        // Step 2: Retrieve the patientId and paymentAmount from the request
        $patientId = $request->patientId;
        $paymentAmount = $request->paymentAmount;

        // Step 3: Fetch the current payment from the database for this patient
        $currentPayment = DB::table('patients')->where('patientID', $patientId)->value('payment');

        // Step 4: Check if the payment amount exceeds the current payment
        if ($paymentAmount > $currentPayment) {
            return redirect()->back()->with('error', 'Payment amount exceeds the current due amount.');
        }

        // Step 5: Calculate the new total cost (based on days stayed, appointments, and medications)
        $daysStayed = DB::table('patients')
            ->select(DB::raw('DATEDIFF(CURDATE(), admission_date) AS days_stayed'))
            ->where('patientID', $patientId)
            ->value('days_stayed');

        $medicationCount = DB::table('patients AS p')
            ->join('perscriptions AS pr', 'p.patientID', '=', 'pr.patientID')
            ->join('medications AS m', 'pr.perscriptionID', '=', 'm.perscriptionID')
            ->where('p.patientID', $patientId)
            ->count('m.medName');

        $appointmentCount = DB::table('patients AS p')
            ->join('appointments AS a', 'p.patientID', '=', 'a.patientID')
            ->where('p.patientID', $patientId)
            ->count('a.appointmentID');

        // Define costs
        $dailyRate = 10; // Cost per day
        $appointmentCost = 50; // Cost per appointment
        $medicineUnitCost = 5; // Cost per medication unit

        // Step 6: Calculate the total cost
        $totalCost = ($daysStayed * $dailyRate) + ($appointmentCount * $appointmentCost) + ($medicationCount * $medicineUnitCost);

        // Step 7: Calculate the new payment balance by subtracting the previous payments from the total cost
        $newBalance = $totalCost - $paymentAmount;

        // Step 8: Update the patient's payment balance
        try {
            $updatedRows = DB::table('patients')
                ->where('patientID', $patientId)
                ->update([
                    'payment' => $newBalance // Update payment
                ]);

            if ($updatedRows > 0) {
                return redirect()->back()->with('success', 'Payment submitted successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update payment. No records were affected.');
            }
        } catch (\Exception $e) {
            // Step 9: Handle database errors
            return redirect()->back()->with('error', 'An error occurred while processing the payment.');
        }
    }

    /**
     * Search for a patient and calculate payment details.
     */
    public function search(Request $request)
    {
        // Validate patient ID
        $request->validate([
            'patientId' => 'required|exists:patients,patientID', // Ensure patient exists with patientID column
        ]);

        $patientId = $request->patientId;

        // Fetch patient details
        $patient = DB::table('patients')->where('patientID', $patientId)->first();
        
        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found.');
        }

        // Calculate days stayed
        $daysStayed = DB::table('patients')
            ->select(DB::raw('DATEDIFF(CURDATE(), admission_date) AS days_stayed'))
            ->where('patientID', $patientId)
            ->value('days_stayed');
        
        // Fetch medication count
        $medicationCount = DB::table('patients AS p')
            ->join('perscriptions AS pr', 'p.patientID', '=', 'pr.patientID')
            ->join('medications AS m', 'pr.perscriptionID', '=', 'm.perscriptionID')
            ->where('p.patientID', $patientId)
            ->count('m.medName');

        // Fetch appointment count
        $appointmentCount = DB::table('patients AS p')
            ->join('appointments AS a', 'p.patientID', '=', 'a.patientID')
            ->where('p.patientID', $patientId)
            ->count('a.appointmentID');

        // Calculate total cost
        $dailyRate = 10;
        $appointmentCost = 50;
        $medicineUnitCost = 5;
        $totalCost = ($daysStayed * $dailyRate) + ($appointmentCount * $appointmentCost) + ($medicationCount * $medicineUnitCost);

        // Update the total cost and payment in the database
        DB::table('patients')
            ->where('patientID', $patientId)
            ->update([
                'payment' => $totalCost
            ]);

        return view('payments', compact('patient', 'daysStayed', 'medicationCount', 'appointmentCount', 'totalCost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Handle updating payment data here if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Handle deleting payment data here if needed
    }
}
