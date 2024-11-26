<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0zNzNiYXRjaDE1LWJnLTExLmpwZw.jpg'); /* Replace with your image */
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
        <h1>Doctor's Appointments</h1>
        <form method="POST" action="{}">
            @csrf

            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient ID</label>
                <input type="text" class="form-control" id="patient_id" name="patient_id" placeholder="Enter Patient ID" required>
            </div>
            <div class="mb-3">
                <label for="patient_name" class="form-label">Patient Name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name" readonly>
            </div>
            <div class="mb-3">
                <label for="appointment_date" class="form-label">Date</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>
            <div class="mb-3">
                <label for="doctor_id" class="form-label">Doctor</label>
                <select class="form-select" id="doctor_id" name="doctor_id" required>
                    <option value="" selected disabled>Select a Doctor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Schedule Appointment</button>
        </form>
    </div>
   
</body>
</html>