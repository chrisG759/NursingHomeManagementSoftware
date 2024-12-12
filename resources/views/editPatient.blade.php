<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Patient</title>
</head>
<body>
    <h1>Edit Patient</h1>
    <form action="{{ route('patients.update', $patient->patientID) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="first_name" value="{{ $patient->first_name }}"></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="last_name" value="{{ $patient->last_name }}"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" value="{{ $patient->email }}"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="text" name="password" value="{{ $patient->password }}"></td>
            </tr>
            <tr>
                <td>Admission Date</td>
                <td><input type="text" name="admission_date" value="{{ $patient->admission_date }}"></td>
            </tr>
            <tr>
                <td>Phone Number: </td>
                <td><input type="text" name="phoneNumber" value="{{ $patient->phoneNumber }}"></td>
            </tr>
            <tr>
                <td>Morning Med ID: </td>
                <td><input type="text" name="morning_medID" value="{{ $patient->morning_medID }}"></td>
            </tr>
            <tr>
                <td>Afternoon Med ID: </td>
                <td><input type="text" name="afternoon_medID" value="{{ $patient->afternoon_medID }}"></td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td><input type="text" name="date_of_birth" value="{{ $patient->date_of_birth }}"></td>
            </tr>
            <tr>
                <td>Emergency Contact: </td>
                <td><input type="text" name="emergency_contact" value="{{ $patient->emergency_contact }}"></td>
            </tr>
            <tr>
                <td>Emergency Contact Relation: </td>
                <td><input type="text" name="emergency_contact_relation" value="{{ $patient->emergency_contact_relation }}"></td>
            </tr>
            <tr>
                <td>Family Code: </td>
                <td><input type="text" name="familyID" value="{{ $patient->familyID }}"></td>
            </tr>
            <tr>
                <td>Group ID: </td>
                <td><input type="text" name="groupID" value="{{ $patient->groupID }}"></td>
            </tr>
            <tr>
                <td>Payment: </td>
                <td><input type="text" name="payment" value="{{ $patient->payment }}"></td>
            </tr>
        </table>
        <input type="submit" value="Modify Patient">
    </form>
</body>
</html>