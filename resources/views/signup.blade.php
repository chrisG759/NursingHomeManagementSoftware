<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Nursing Home Management</title>
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

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        .container {
            padding: 20px;
            background-color: white;
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="date"], select {
            padding: 8px;
            font-size: 16px;
            width: 100%;
            margin: 10px 0;
        }

        input[type="submit"] {
            background-color: #004d99;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #003366;
        }

        .hidden {
            display: none;
        }

    </style>
</head>
<body>

    <header>
        <h1>Register for Nursing Home Management System</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <form action="{{ route('signup.store') }}" method="POST" id="registerForm">
            @csrf
            @method('POST')
            <fieldset>
                <legend>Create Account</legend>

                <label for="role">Role:</label>
                <select id="role" name="role" onchange="togglePatientFields()">
                    <option value="admin">Admin</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="patient">Patient</option>
                    <option value="doctor">Doctor</option>
                    <option value="Caregiver">Caregiver</option>
                </select><br>

                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required><br>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phoneNumber" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="password_confirmation" required><br>

                <div id="patientFields" class="hidden">
                    <label for="family_code">Family Code:</label>
                    <input type="text" id="family_code" name="family_code"><br>

                    <label for="emergency_contact">Emergency Contact:</label>
                    <input type="text" id="emergency_contact" name="emergency_contact"><br>

                    <label for="relation_to_emergency">Relation to Emergency Contact:</label>
                    <input type="text" id="relation_to_emergency" name="relation_to_emergency"><br>
                </div>

                <input type="submit" value="Register">
            </fieldset>
        </form>
    </div>

    <script>
        function togglePatientFields() {
            var role = document.getElementById("role").value;
            var patientFields = document.getElementById("patientFields");

            if (role === "patient") {
                patientFields.classList.remove("hidden"); // Show patient fields
            } else {
                patientFields.classList.add("hidden"); // Hide patient fields
            }
        }

        window.onload = togglePatientFields;
    </script>

</body>
</html>
