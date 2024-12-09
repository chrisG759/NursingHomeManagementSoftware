<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roster - Nursing Home Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #004d99;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .container {
            padding: 20px;
            background-color: white;
            max-width: 1200px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header a{
            color: white;
        }

        .date-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .date-container input {
            font-size: 18px;
            padding: 5px 10px;
            width: 200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #004d99;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        .roster-table td {
            vertical-align: top;
        }

        .role-header {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .role-name {
            font-size: 16px;
        }

        .error {
            color: red;
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <header>
        <h1>Nursing Home Roster</h1>
        <a href="{{ view('adminReport') }}">Admin Report</a>
    </header>

    <div class="container">
        <div class="date-container">
            <label for="date">Date: </label>
            <input type="date" id="date" value="{{ $currentDate }}">
        </div>

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <table class="roster-table">
            <thead>
                <tr>
                    <th>Supervisor</th>
                    <th>Doctor</th>
                    <th>Caregiver 1</th>
                    <th>Caregiver 2</th>
                    <th>Caregiver 3</th>
                    <th>Caregiver 4</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="role-header">Name</div>
                        <span class="role-name">{{ $supervisor->name ?? 'N/A' }}</span>
                    </td>
                    <td>
                        <div class="role-header">Name</div>
                        <span class="role-name">{{ $doctor->first_name ?? 'N/A' }}</span>
                    </td>
                    @for($i = 0; $i < 4; $i++)
                        <td>
                            <div class="role-header">Name</div>
                            <span class="role-name">{{ $caregivers[$i]->name ?? 'N/A' }}</span>
                        </td>
                    @endfor
                </tr>
            </tbody>
        </table>

        <h2 style="text-align: center; margin-top: 40px;">Patient Group</h2>
        <table class="roster-table">
            <thead>
                <tr>
                    <th>Caregiver</th>
                    <th>Patient Group</th>
                </tr>
            </thead>
            <tbody>
                @foreach($caregivers as $caregiver)
                <tr>
                    <td>{{ $caregiver->name }}</td>
                    <td>{{ $patientGroup }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById("date").addEventListener("change", function () {
            const selectedDate = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set('date', selectedDate);
            window.location.href = url; 
        });
    </script>

</body>
</html>
