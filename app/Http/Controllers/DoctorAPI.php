<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorAPI 
{
    /**
     * Display a listing of all appointments with patient details.
     */
    public function index()
    {
        // Fetch all appointments, joining with the patients table to get patient details
        $appointments = DB::table('appointments')
            ->join('patients', 'appointments.patientID', '=', 'patients.patientID')
            ->select(
                'appointments.appointmentID',
                'appointments.date',
                'appointments.comment',
                'patients.first_name',
                'patients.last_name',
                'patients.morning_medID',
                'patients.afternoon_medID',
                'patients.night_medID'
            )
            ->get();

        // Pass the appointments data to the view
        return view('DoctorHome', compact('appointments'));
    }

    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'patientID' => 'required|exists:patients,patientID',
            'date' => 'required|date',
            'comment' => 'nullable|string',
            'morning_medID' => 'nullable|exists:prescriptions,perscriptionID',
            'afternoon_medID' => 'nullable|exists:prescriptions,perscriptionID',
            'night_medID' => 'nullable|exists:prescriptions,perscriptionID',
        ]);

        // Insert the appointment into the database
        DB::table('appointments')->insert([
            'patientID' => $validated['patientID'],
            'date' => $validated['date'],
            'comment' => $validated['comment'] ?? '',
            'morning_medID' => $validated['morning_medID'] ?? null,
            'afternoon_medID' => $validated['afternoon_medID'] ?? null,
            'night_medID' => $validated['night_medID'] ?? null,
            'doctorID' => auth()->user()->doctorID, // assuming you're using Laravel's auth system
        ]);

        return redirect()->route('doctor.appointments')->with('success', 'Appointment added successfully!');
    }

    /**
     * Display the specified appointment details.
     */
    public function show($id)
    {
        // Fetch the appointment along with patient and prescription details
        $appointment = DB::table('appointments')
            ->join('patients', 'appointments.patientID', '=', 'patients.patientID')
            ->leftJoin('prescriptions as morning', 'appointments.morning_medID', '=', 'morning.perscriptionID')
            ->leftJoin('prescriptions as afternoon', 'appointments.afternoon_medID', '=', 'afternoon.perscriptionID')
            ->leftJoin('prescriptions as night', 'appointments.night_medID', '=', 'night.perscriptionID')
            ->where('appointments.appointmentID', $id)
            ->select(
                'appointments.appointmentID',
                'appointments.date',
                'appointments.comment',
                'patients.first_name',
                'patients.last_name',
                'morning.medication_name as morning_medication',
                'afternoon.medication_name as afternoon_medication',
                'night.medication_name as night_medication'
            )
            ->first();

        return view('appointment_details', compact('appointment'));
    }

    /**
     * Update the specified appointment in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'date' => 'required|date',
            'comment' => 'nullable|string',
            'morning_medID' => 'nullable|exists:prescriptions,perscriptionID',
            'afternoon_medID' => 'nullable|exists:prescriptions,perscriptionID',
            'night_medID' => 'nullable|exists:prescriptions,perscriptionID',
        ]);

        // Update the appointment record
        DB::table('appointments')
            ->where('appointmentID', $id)
            ->update([
                'date' => $validated['date'],
                'comment' => $validated['comment'] ?? '',
                'morning_medID' => $validated['morning_medID'] ?? null,
                'afternoon_medID' => $validated['afternoon_medID'] ?? null,
                'night_medID' => $validated['night_medID'] ?? null,
            ]);

        return redirect()->route('doctor.appointments')->with('success', 'Appointment updated successfully!');
    }

    /**
     * Remove the specified appointment from storage.
     */
    public function destroy($id)
    {
        // Delete the appointment
        DB::table('appointments')->where('appointmentID', $id)->delete();

        return redirect()->route('doctor.appointments')->with('success', 'Appointment deleted successfully!');
    }

    /**
     * Search for old appointments by date or patient name.
     */
    public function searchOldAppointments(Request $request)
    {
        $date = $request->get('date');
        $patient = $request->get('patient');

        // Fetch appointments based on search criteria
        $appointments = DB::table('appointments')
            ->join('patients', 'appointments.patientID', '=', 'patients.patientID')
            ->select(
                'appointments.appointmentID',
                'appointments.date',
                'appointments.comment',
                'patients.first_name',
                'patients.last_name'
            )
            ->when($date, function ($query) use ($date) {
                return $query->where('appointments.date', $date);
            })
            ->when($patient, function ($query) use ($patient) {
                return $query->where(function ($query) use ($patient) {
                    $query->where('patients.first_name', 'like', "%$patient%")
                        ->orWhere('patients.last_name', 'like', "%$patient%");
                });
            })
            ->get();

        return response()->json($appointments);
    }
}
