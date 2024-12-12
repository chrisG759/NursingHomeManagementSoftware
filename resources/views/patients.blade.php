<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patients</title>
    <style>
        table {
            border: 1px solid black;
        }
        tr, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Patients</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Admission Date</td>
            <td>Phone Number</td>
            <td>Morning Medication</td>
            <td>Afternoon Medication</td>
            <td>Night Medication</td>
            <td>Date Of Birth</td>
            <td>Emergency Contact</td>
            <td>Emergency Contact Relation</td>
            <td>Family Code</td>
            <td>Group ID</td>
            <td>Payment</td>
            <td>Actions</td>
        </tr>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->patientID }}</td>
                <td>{{ $patient->first_name }}</td>
                <td>{{ $patient->last_name }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->password }}</td>
                <td>{{ $patient->admission_date }}</td>
                <td>{{ $patient->phoneNumber }}</td>
                <td>{{ $patient->morning_medID }}</td>
                <td>{{ $patient->afternoon_medID }}</td>
                <td>{{ $patient->night_medID }}</td>
                <td>{{ $patient->date_of_birth }}</td>
                <td>{{ $patient->emergency_contact }}</td>
                <td>{{ $patient->emergency_contact_relation }}</td>
                <td>{{ $patient->familyID }}</td>
                <td>{{ $patient->groupID }}</td>
                <td>{{ $patient->payment }}</td>
                <td>
                    <form action="{{ route('patients.destroy', $patient->patientID) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                    <form action="{{ route('patients.show', $patient->patientID) }}" method="GET">
                        @csrf
                        <input type="submit" value="Modify">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
