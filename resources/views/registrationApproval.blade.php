<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Approval Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 15px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        .actions {
            margin: 10px 0;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        button {
            padding: 8px 15px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .ok-button {
            background-color: #4CAF50;
            color: white;
        }

        .cancel-button {
            background-color: #8B0000;
            color: white;
        }

        p {
            font-size: 12px;
            color: #555;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Approval</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Yes</th>
                <th>No</th>
            </tr>
            <tr>
                <td id="user-name">John Doe</td>
                <td id="user-role">Supervisor</td>
                <td><input type="radio" name="approval" id="yes" value="yes"></td>
                <td><input type="radio" name="approval" id="no" value="no"></td>
            </tr>
        </table>
        <div class="actions">
            <button class="ok-button" onclick="handleApproval()">OK</button>
            <button class="cancel-button" onclick="handleCancel()">Cancel</button>
        </div>
        <p>Admin View Only.</p>
    </div>

    <script>
        function handleApproval() {
            const yesChecked = document.getElementById('yes').checked;
            const noChecked = document.getElementById('no').checked;

            if (yesChecked || noChecked) {
                document.getElementById('user-name').textContent = '';
                document.getElementById('user-role').textContent = '';
                alert(yesChecked ? 'Approved!' : 'Rejected!');
            } else {
                alert('Please select Yes or No before proceeding.');
            }
        }

        function handleCancel() {
            document.getElementById('user-name').textContent = '';
            document.getElementById('user-role').textContent = '';
            alert('Action canceled.');
        }
    </script>
</body>
</html>
