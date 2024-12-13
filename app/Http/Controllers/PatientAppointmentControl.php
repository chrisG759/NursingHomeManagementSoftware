<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientAppointmentControl
{
    public function getAppointmentDetails(Request $request)
    {
        $patientId = $request->input('patientID');
        $date = $request->input('date');

        $appointments = DB::table('appointments')
            ->where('date', '=', $date)
            ->where('patientID', '=', $patientId)
            ->get();

        foreach ($appointments as $appointment) {
            $doctor = DB::table('doctors')
                ->where('doctorID', '=', $appointment->doctorID)
                ->first();
            $appointment->doctor_name = $doctor ? $doctor->first_name . ' ' . $doctor->last_name : 'Unknown';
        }

        return view('appointmentDetails', ['appointments' => $appointments]);
    }

    public function makeAppointment(Request $request){
        $doctors = DB::table('doctors')
            ->get();

        return view('makeAppointment', ['doctors' => $doctors]);
    }

    public function submitAppointment(Request $request){
        
    }
}
