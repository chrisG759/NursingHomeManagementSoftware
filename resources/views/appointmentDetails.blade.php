<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 700px;
            margin: 50px auto;
        }
        h3 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #004d99;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3>Appointment Details</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Doctor's Name</th>
                    <th>Appointment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->doctor_name }}</td>
                    <td>{{ $appointment->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button id="backBut">Patient Home</button>
        
    </div>
    <script>
        var backBut = document.getElementById('backBut');

        backBut.addEventListener('click', () => {
            window.location.href = '/patient-home';
        });
    </script>
</body>
</html>
