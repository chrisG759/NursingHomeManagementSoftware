<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Home Page</title>
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
        <h1>Welcome, Dr. {{ auth()->user()->name }}</h1>
        <h3>Today's Patients</h3>

         <form id="search-form" class="mb-4">
            <div class="row">
                <div class="col-md-2">
                    <input type="text" class="form-control" id="search-name" placeholder="Search Name">
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" id="search-date">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="search-comment" placeholder="Search Comment">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="search-morning" placeholder="Morning Meds">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="search-afternoon" placeholder="Afternoon Meds">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="search-night" placeholder="Night Meds">
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Comment</th>
                    <th>Morning Meds</th>
                    <th>Afternoon Meds</th>
                    <th>Night Meds</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="patient-list">
                 <tr>
                    <td>{{ name }}</td>
                    <td>{{ appointment_date }}</td>
                    <td>{{ comment }}</td>
                    <td>{{ morning_meds }}</td>
                    <td>{{ afternoon_meds }}</td>
                    <td>{{ night_meds }}</td>
 
                </tr>
                
            </tbody>
        </table>


        <h3>Upcoming Appointments</h3>
        <h3>Search Old Appointments</h3>
        <form id="old-appointments-search" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" class="form-control" id="old-search-date" placeholder="Search by Date">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="old-search-patient" placeholder="Search by Patient Name">
                </div>
                <div class="col-md-4">
                    <button type="button" id="search-old" class="btn btn-secondary">Search</button>
                </div>
            </div>
        </form>

        <div id="old-appointments-list">

        </div>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('search-form').addEventListener('input', function() {
            const name = document.getElementById('search-name').value.toLowerCase();
            const rows = document.querySelectorAll('#patient-list tr');
           
            rows.forEach(row => {
                const patientName = row.cells[0].textContent.toLowerCase();
                row.style.display = patientName.includes(name) ? '' : 'none';
            });
        });

        document.getElementById('search-old').addEventListener('click', function() {
            const date = document.getElementById('old-search-date').value;
            const patient = document.getElementById('old-search-patient').value;

             fetch(`/api/doctor/old-appointments?date=${date}&patient=${patient}`)
                .then(response => response.json())
                .then(data => {
                    const list = document.getElementById('old-appointments-list');
                    list.innerHTML = '';
                    data.forEach(appointment => {
                        list.innerHTML += `<p>${appointment.date} - Patient: ${appointment.patient_name}</p>`;
                    });
                });
        });
    </script>
</body>
</html>
