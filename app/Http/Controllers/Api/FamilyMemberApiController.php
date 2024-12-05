<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class FamilyMemberApiController 
{
    public function getAppointmentDetails(Request $request)
    {
        $familyCode = $request->input('family_code');
        $familyId = $request->input('family_id');

        $patient = Patient::where('family_code', $familyCode)
            ->where('family_id', $familyId)
            ->first();

        if ($patient) {
            return response()->json([
                'success' => true,
                'patient' => $patient
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Patient not found'], 404);
    }
}
