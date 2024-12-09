<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor's Homepage Test</title>
<style>
body {
    background-image: url('https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0zNzNiYXRjaDE1LWJnLTExLmpwZw.jpg');
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.breadcrumb {
    margin-bottom: 20px;
    list-style: none;
    display: flex;
    gap: 10px;
}

.breadcrumb li {
    display: inline;
}

.breadcrumb li a {
    text-decoration: none;
    color: #007bff;
}

.breadcrumb li::after {
    content: ">";
    margin: 0 5px;
}

.breadcrumb li:last-child::after {
    content: "";
}

.filters {
    display: flex;
    flex-direction: column; 
    gap: 10px;
    margin-bottom: 20px;
}

.filters input[type="text"],
.filters input[type="date"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    max-width: 400px; 
}

.filters .button-group {
    display: flex;
    gap: 10px;
}

.filters button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.filters button:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: #f4f4f4;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}
</style>
</head>
<body>

<div class="container">
    <ul class="breadcrumb">
        <li>Appointments</li>
    </ul>

    <div class="filters">
        <input type="text" id="searchBar" placeholder="Search by Name, Date, or Medications">
        <input type="date" id="datePicker">
        <div class="button-group">
            <button onclick="searchPatient()">Search</button>
            <button onclick="clearFilters()">Clear</button>
        </div>
    </div>

    <table id="appointmentsTable">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Appointment Date</th>
                <th>Medications (Morning)</th>
                <th>Medications (Afternoon)</th>
                <th>Medications (Night)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="patientData"></tbody>
    </table>
</div>

<script>
function clearFilters() {
    document.getElementById('searchBar').value = '';
    document.getElementById('datePicker').value = '';
    document.getElementById('patientData').innerHTML = ''; 
}

function searchPatient() {
    const searchTerm = document.getElementById('searchBar').value;
    const date = document.getElementById('datePicker').value;

    let url = `fetch_patients.php?search=${searchTerm}`;

    if (date) {
        url += `&date=${date}`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('patientData');
            tableBody.innerHTML = ''; 

            if (data.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="6">No results found</td></tr>';
                return;
            }

            data.forEach(patient => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${patient.name}</td>
                    <td>${patient.appointment_date}</td>
                    <td>${patient.morning_medications}</td>
                    <td>${patient.afternoon_medications}</td>
                    <td>${patient.night_medications}</td>
                    <td><button onclick="viewDetails(${patient.patient_id})">Details</button></td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}

function viewDetails(patientId) {
    alert('Viewing details for patient ID: ' + patientId);
}
</script>

</body>
</html>
