<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0zNzNiYXRjaDE1LWJnLTExLmpwZw.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        h1, label {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to Your Homepage</h1>
        <form id="patient-form">
            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient ID</label>
                <input type="text" class="form-control" id="patient_id" placeholder="Enter Patient ID" required>
            </div>
            <div class="mb-3">
                <label for="patient_name" class="form-label">Patient Name</label>
                <input type="text" class="form-control" id="patient_name" readonly>
            </div>
            <div class="mb-3">
                <label for="appointment_date" class="form-label">Date</label>
                <input type="date" class="form-control" id="appointment_date" value= "date" required>
            </div>

            <button type="button" id="view-details" class="btn btn-primary">View Appointment Details</button>
        </form>
        <div class="mt-4" id="appointment-details" style="display: none;">
            <h3>Appointment Details</h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Doctor's Name</th>
                        <td id="doctor_name"></td>
                    </tr>
                    <tr>
                        <th>Appointment Date & Time</th>
                        <td id="appointment_time"></td>
                    </tr>
                    <tr>
                        <th>Caregiver's Name</th>
                        <td id="caregiver_name"></td>
                    </tr>
                    <tr>
                        <th>Morning Medicine</th>
                        <td id="morning_medicine"></td>
                    </tr>
                    <tr>
                        <th>Afternoon Medicine</th>
                        <td id="afternoon_medicine"></td>
                    </tr>
                    <tr>
                        <th>Night Medicine</th>
                        <td id="night_medicine"></td>
                    </tr>
                    <tr>
                        <th>Breakfast</th>
                        <td id="breakfast"></td>
                    </tr>
                    <tr>
                        <th>Lunch</th>
                        <td id="lunch"></td>
                    </tr>
                    <tr>
                        <th>Dinner</th>
                        <td id="dinner"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('patient_id').addEventListener('blur', function() {
            const patientId = this.value;

            fetch(`/api/patient/${patientId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('patient_name').value = data.patient.name;
                    } else {
                        alert('Patient not found');
                        document.getElementById('patient_name').value = '';
                    }
                })
                .catch(error => console.error('Error fetching patient:', error));
        });
        document.getElementById('view-details').addEventListener('click', function() {
            const patientId = document.getElementById('patient_id').value;
            const date = document.getElementById('appointment_date').value;

            if (!patientId) {
                alert('Please enter a Patient ID');
                return;
            }

            fetch(`/api/appointment/details?patient_id=${patientId}&date=${date}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('doctor_name').textContent = data.appointment.doctor_name;
                        document.getElementById('appointment_time').textContent = data.appointment.time;
                        document.getElementById('caregiver_name').textContent = data.appointment.caregiver_name;
                        document.getElementById('morning_medicine').textContent = data.appointment.morning_medicine || 'N/A';
                        document.getElementById('afternoon_medicine').textContent = data.appointment.afternoon_medicine || 'N/A';
                        document.getElementById('night_medicine').textContent = data.appointment.night_medicine || 'N/A';
                        document.getElementById('breakfast').textContent = data.appointment.breakfast || 'N/A';
                        document.getElementById('lunch').textContent = data.appointment.lunch || 'N/A';
                        document.getElementById('dinner').textContent = data.appointment.dinner || 'N/A';
                        document.getElementById('appointment-details').style.display = 'block';
                    } else {
                        alert('No appointment details found for this date');
                        document.getElementById('appointment-details').style.display = 'none';
                    }
                })
                .catch(error => console.error('Error fetching appointment details:', error));
        });
    </script>
</body>
</html>