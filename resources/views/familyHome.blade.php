<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Member Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0zNzNiYXRjaDE1LWJnLTExLmpwZw.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            padding: 0;
            margin: 0;
            height: 100vh;
        }


        h1, h3 {
            color: white;
            font-weight: bold;
            margin-bottom: 30px;
        }

        h1 {
            text-align: center;
        }

        .info-section input {
            margin: 5px 0;
        }

        .info-section label {
            font-size: 16px;
            font-weight: bold;
        }

        .patient-card {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            display: none;
        }

        #current-date-label {
            font-weight: bold;
            font-size: 18px;
        }

        input[type="text"], input[type="date"], input[type="password"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        table{
            border: 1px solid white
        }
        tr, td{
            border: 1px solid white
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="mb-4">
            <h1>Family Members Homepage</h1>
        </div>

        <div class="info-section">
            <form action="">
                @csrf
                <label for="family Code">Enter Family Code: </label>
                <input type="text" name="familyCode">
                <input type="submit" value="OK">
            </form>
        </div>
            <div class="card-header">
                <h4>Patient Information</h4>
            </div>
            @if(isset($patient))
                <table>
                    <tr>
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
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
                    </tr>
                    <tr>
                        <td>{{ $patient->patientID }}</td>
                        <td>{{ $patient->first_name }}</td>
                        <td>{{ $patient->last_name }}</td>
                        <td>{{ $patient->email }}</td>
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
                    </tr>
                </table>
            @endif
    </div>
    <button id="toPayment">Pay Payment</button>
    <script>
        const paymentBut = document.getElementById('toPayment');

        paymentBut.addEventListener('click', function(){
            window.location.href = '/payment';
        });
    </script>
</body>

</html>
