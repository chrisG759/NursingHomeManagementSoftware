<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Roster</title>
    <style>
        body {
            background: linear-gradient(120deg, #f3f4f7, #e8eaf6);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create New Roster</h2>
        <form id="rosterForm">
            <div class="form-group">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date" name="date" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="supervisor_id" class="form-label">Supervisor</label>
                <select id="supervisor_id" name="supervisor_id" class="form-select" required>
                    <option value="" disabled selected>Select a supervisor</option>
                </select>
            </div>

            <div class="form-group">
                <label for="doctor_id" class="form-label">Doctor</label>
                <select id="doctor_id" name="doctor_id" class="form-select" required>
                    <option value="" disabled selected>Select a doctor</option>
                </select>
            </div>

            <div class="form-group">
                <label for="caregiver_1_id" class="form-label">Caregiver 1</label>
                <select id="caregiver_1_id" name="caregiver_1_id" class="form-select">
                    <option value="" disabled selected>Select a caregiver</option>
                </select>
            </div>

            <div class="form-group">
                <label for="caregiver_2_id" class="form-label">Caregiver 2</label>
                <select id="caregiver_2_id" name="caregiver_2_id" class="form-select">
                    <option value="" disabled selected>Select a caregiver</option>
                </select>
            </div>

            <div class="form-group">
                <label for="caregiver_3_id" class="form-label">Caregiver 3</label>
                <select id="caregiver_3_id" name="caregiver_3_id" class="form-select">
                    <option value="" disabled selected>Select a caregiver</option>
                </select>
            </div>

            <div class="form-group">
                <label for="caregiver_4_id" class="form-label">Caregiver 4</label>
                <select id="caregiver_4_id" name="caregiver_4_id" class="form-select">
                    <option value="" disabled selected>Select a caregiver</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Confirm</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>

    <script>
        async function fetchOptions() {
            const response = await fetch('/api/roster-options');
            const data = await response.json();

            populateDropdown('supervisor_id', data.supervisors);
            populateDropdown('doctor_id', data.doctors);
            ['caregiver_1_id', 'caregiver_2_id', 'caregiver_3_id', 'caregiver_4_id'].forEach(id => {
                populateDropdown(id, data.caregivers);
            });
        }

        function populateDropdown(elementId, options) {
            const select = document.getElementById(elementId);
            options.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option.id;
                opt.textContent = option.name;
                select.appendChild(opt);
            });
        }

        document.getElementById('rosterForm').addEventListener('submit', async function (event) {
            event.preventDefault();

            const formData = new FormData(this);
            const response = await fetch('/api/rosters', {
                method: 'POST',
                body: JSON.stringify(Object.fromEntries(formData)),
                headers: {
                    'Content-Type': 'application/json',
                },
            });

            if (response.ok) {
                alert('Roster created successfully!');
                this.reset();
            } else {
                alert('Failed to create roster.');
            }
        });

        fetchOptions();
    </script>
</body>
</html>