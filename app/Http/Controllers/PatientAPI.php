<?php

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientApiController 
{
    public function getPatientDetails($patientId)
    {
        $patient = Patient::find($patientId);

        if ($patient) {
            return response()->json([
                'success' => true,
                'patient' => [
                    'name' => $patient->name,
                    'id' => $patient->id,
                    'doctor_name' => $patient->doctor_name,
                    'appointment_time' => $patient->appointment_time,
                    'caregiver_name' => $patient->caregiver_name,
                    'morning_medicine' => $patient->morning_medicine,
                    'afternoon_medicine' => $patient->afternoon_medicine,
                    'night_medicine' => $patient->night_medicine,
                    'breakfast' => $patient->breakfast,
                    'lunch' => $patient->lunch,
                    'dinner' => $patient->dinner
                ]
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Patient not found'], 404);
    }
}
