<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PaymentAPI
{
    /**
     * Display the payment form or listing.
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
        // Validate the payment input
        $request->validate([
            'patientId' => 'required|exists:patients,patientID',
            'paymentAmount' => 'required|numeric|min:0',
        ]);

        $patientId = $request->patientId;
        $paymentAmount = $request->paymentAmount;

        // Fetch the current payment balance from the database for this patient
        $patient = DB::table('patients')->where('patientID', $patientId)->first();

        // If the patient doesn't exist, return error
        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found.');
        }

        // Calculate the new balance after payment
        $newBalance = $patient->payment - $paymentAmount;

        // Begin a transaction to update the patient's payment balance
        DB::beginTransaction();
        try {
            DB::table('patients')
                ->where('patientID', $patientId)
                ->update([
                    'payment' => $newBalance
                ]);

            DB::commit();  // Commit the transaction if successful

            // Redirect back to the search method to fetch the updated details
            return redirect()->route('payment.search', ['patientId' => $patientId])
                             ->with('success', 'Payment submitted successfully.');
        } catch (Exception $e) {
            DB::rollBack();  // Rollback if there's an error
            return redirect()->back()->with('error', 'An error occurred while processing the payment.');
        }
    }

    /**
     * Search for a patient and calculate payment details.
     */
    public function search(Request $request)
    {
        $request->validate([
            'patientId' => 'required|exists:patients,patientID',
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

        // Return the view with patient details and total cost
        return view('payments', compact('patient', 'daysStayed', 'medicationCount', 'appointmentCount', 'totalCost'));
    }
}
