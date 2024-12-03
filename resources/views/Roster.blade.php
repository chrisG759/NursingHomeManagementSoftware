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
    </style>
</head>
<body>

    <header>
        <h1>Nursing Home Roster</h1>
    </header>

    <div class="container">

        <!-- Date Container -->
        <div class="date-container">
            <label for="date">Date: </label>
            <input type="date" id="date" value="{{ date('Y-m-d') }}" onchange="updateDate()">
        </div>

        <!-- Roster Table (Supervisors, Doctors, Caregivers) -->
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
                        <span class="role-name">John Doe</span>
                    </td>
                    <td>
                        <div class="role-header">Name</div>
                        <span class="role-name">Dr. Smith</span>
                    </td>
                    <td>
                        <div class="role-header">Name</div>
                        <span class="role-name">Alice Brown</span>
                    </td>
                    <td>
                        <div class="role-header">Name</div>
                        <span class="role-name">Bob Green</span>
                    </td>
                    <td>
                        <div class="role-header">Name</div>
                        <span class="role-name">Charlie White</span>
                    </td>
                    <td>
                        <div class="role-header">Name</div>
                        <span class="role-name">Diana Black</span>
                    </td>
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
                <tr>
                    <td>Caregiver 1 (Alice Brown)</td>
                    <td>Group A</td>
                </tr>
                <tr>
                    <td>Caregiver 2 (Bob Green)</td>
                    <td>Group B</td>
                </tr>
                <tr>
                    <td>Caregiver 3 (Charlie White)</td>
                    <td>Group C</td>
                </tr>
                <tr>
                    <td>Caregiver 4 (Diana Black)</td>
                    <td>Group D</td>
                </tr>
            </tbody>
        </table>

    </div>

    <script>

        function updateDate() {
            const selectedDate = document.getElementById("date").value;
            console.log("Selected Date: ", selectedDate);
        }
    </script>

</body>
</html>
