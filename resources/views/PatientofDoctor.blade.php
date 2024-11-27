<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
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
        h1, h3, label {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Patient Details for {{ $patient->name }}</h1>
        <p><strong>Patient ID:</strong> {{ $patient->id }}</p>
        <p><strong>Today's Appointment:</strong> {{ $todayAppointment ? 'Yes' : 'No' }}</p>

        <h3>Old Prescriptions</h3>
            <p>No previous prescriptions found.</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Comment</th>
                        <th>Morning Meds</th>
                        <th>Afternoon Meds</th>
                        <th>Night Meds</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $prescription->date }}</td>
                            <td>{{ $prescription->comment }}</td>
                            <td>{{ $prescription->morning_meds }}</td>
                            <td>{{ $prescription->afternoon_meds }}</td>
                            <td>{{ $prescription->night_meds }}</td>
                        </tr>
                </tbody>
            </table>
        <h3>New Prescription</h3>
            <form action="{{ route('doctor.patient.prescription.store', $patient->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" id="date" name="date" class="form-control" value="{{ now()->toDateString() }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea id="comment" name="comment" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="morning_meds" class="form-label">Morning Meds</label>
                    <input type="text" id="morning_meds" name="morning_meds" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="afternoon_meds" class="form-label">Afternoon Meds</label>
                    <input type="text" id="afternoon_meds" name="afternoon_meds" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="night_meds" class="form-label">Night Meds</label>
                    <input type="text" id="night_meds" name="night_meds" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Save Prescription</button>
            </form>
            <p class="text-danger">New prescriptions can only be added on the day of the appointment.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
