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
            color: #333;
            padding: 0;
            margin: 0;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            max-width: 900px;
            margin: 50px auto;
        }

        h1, h3 {
            color: #444;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .table th, .table td {
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
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            display: none; 
        }

        .info-section {
            margin-bottom: 20px;
        }

        .action-buttons {
            margin-top: 10px;
        }

        #current-date-label {
            font-weight: bold;
            font-size: 18px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 6px 6px 0 0;
        }

        .card-body {
            padding: 15px;
        }

        input[type="text"], input[type="date"], input[type="password"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
        }

        .action-buttons button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4">
            <h3 id="current-date-label">Today's Date:</h3>
            <input type="date" id="current-date" class="form-control" onchange="updateDate()" value="" />
        </div>

        <div class="info-section">
            <label for="family-code">Family Code:</label>
            <input type="text" class="form-control" id="family-code" placeholder="Enter Family Code">

            <label for="family-id">Family ID:</label>
            <input type="text" class="form-control" id="family-id" placeholder="Enter Family ID">
        </div>

        <div class="action-buttons mb-4">
            <button class="btn btn-success" onclick="fetchPatientDetails()">OK</button>
            <button class="btn btn-danger" onclick="cancelDetails()">Cancel</button>
        </div>

        <div class="patient-card" id="patient-info">
            <div class="card-header">
                <h4>Patient Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Doctor's Name</th>
                            <th>Appointment Time</th>
                            <th>Caregiver Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="doctor-name">Dr. John Doe</td>
                            <td id="appointment-time">10:30 AM</td>
                            <td id="caregiver-name">Jane Smith</td>
                        </tr>
                    </tbody>
                </table>

                <h5>Medication and Meals</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Morning Medicine</th>
                            <th>Afternoon Medicine</th>
                            <th>Night Medicine</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="morning-medicine">Aspirin</td>
                            <td id="afternoon-medicine">Vitamin C</td>
                            <td id="night-medicine">Sleep Aid</td>
                            <td id="breakfast">Oatmeal</td>
                            <td id="lunch">Chicken Salad</td>
                            <td id="dinner">Grilled Fish</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function updateDate() {
            const selectedDate = document.getElementById('current-date').value;
            console.log(`Selected Date: ${selectedDate}`);
        }

        const patients = {
            "1234": {
                "family_id": "098765",
                "doctor_name": "Dr. John Doe",
                "appointment_time": "10:30 AM",
                "caregiver_name": "Jane Smith",
                "morning_medicine": "Aspirin",
                "afternoon_medicine": "Vitamin C",
                "night_medicine": "Sleep Aid",
                "breakfast": "Oatmeal",
                "lunch": "Chicken Salad",
                "dinner": "Grilled Fish"
            },
            "5678": {
                "family_id": "112233",
                "doctor_name": "Dr. Sarah Lee",
                "appointment_time": "2:00 PM",
                "caregiver_name": "Emily Davis",
                "morning_medicine": "Insulin",
                "afternoon_medicine": "Pain Reliever",
                "night_medicine": "None",
                "breakfast": "Toast with Jam",
                "lunch": "Vegetable Soup",
                "dinner": "Spaghetti"
            }
        };

        function fetchPatientDetails() {
            const familyCode = document.getElementById('family-code').value;
            const familyId = document.getElementById('family-id').value;

            if (patients[familyCode] && patients[familyCode].family_id === familyId) {
                document.getElementById('patient-info').style.display = 'block'; 

                const patient = patients[familyCode];
                document.getElementById('doctor-name').innerText = patient.doctor_name;
                document.getElementById('appointment-time').innerText = patient.appointment_time;
                document.getElementById('caregiver-name').innerText = patient.caregiver_name;
                document.getElementById('morning-medicine').innerText = patient.morning_medicine;
                document.getElementById('afternoon-medicine').innerText = patient.afternoon_medicine;
                document.getElementById('night-medicine').innerText = patient.night_medicine;
                document.getElementById('breakfast').innerText = patient.breakfast;
                document.getElementById('lunch').innerText = patient.lunch;
                document.getElementById('dinner').innerText = patient.dinner;
            } else {
                alert("Invalid Family Code or Family ID.");
            }
        }

        function cancelDetails() {
            document.getElementById('family-code').value = '';
            document.getElementById('family-id').value = '';
            document.getElementById('patient-info').style.display = 'none';
        }
    </script>
</body>
</html>
