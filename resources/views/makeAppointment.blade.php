<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Make Appointment</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            width: 5cm;
        }
    </style>
</head>
<body>
    <h1>Make Appointment</h1>
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <label for="Patient ID">Patient ID: </label>
        <input type="text" name="patientID">
        <label for="Doctor">Doctor: </label>
        <select name="doctor" id="">
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->doctorID }}">{{ $doctor->first_name." ".$doctor->last_name }}</option>
            @endforeach
        </select>
        <label for="">Comments: </label>
        <input type="text" name="comments">
        <label for="">Date: </label>
        <input type="date" name="date">
        <input type="submit" value="Make Appointment">
    </form>
</body>
</html>