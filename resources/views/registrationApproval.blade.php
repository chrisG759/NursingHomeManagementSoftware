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
        header{
            margin-right: 2cm;
        }
        #header-links, a{
            text-decoration: none;
            margin-bottom: 1cm;
            color: green;
        }
        #header-links{
            list-style-type: none;
        }
        #header-links, a,li{
            margin-bottom: 1cm;
        }
    </style>
</head>
<body>
    <header>
        <ul id="header-links">
            <h2 style="color: black; margin-bottom: 1cm;">Links</h2>
            <a href="{{ route('roster.index') }}">
                <li>Roster</li>
            </a>
            <a href="{{ view('roleAccess') }}">
                <li>Roles</li>
            </a>
        </ul>
    </header>
    <div class="container">
        <h1>Registration Approval</h1>
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('admin.approveAll') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Approve</th>
                    <th>Disapprove</th>
                </tr>
                <?php Log::info('Memory usage before loop: '.memory_get_usage());?>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->role }}</td>
                        <!-- Store the employee ID and approval status in hidden inputs -->
                        <input type="hidden" name="employees[{{ $employee->employeeID }}][employeeID]" value="{{ $employee->employeeID }}">
                        <td><input type="radio" name="employees[{{ $employee->employeeID }}][approval]" value="yes"></td>
                        <td><input type="radio" name="employees[{{ $employee->employeeID }}][approval]" value="no"></td>
                    </tr>
                @endforeach
                <?php Log::info('Memory usage after loop: '.memory_get_usage());?>
            </table>
        
            <div class="actions">
                <button type="submit" class="ok-button">Submit All</button>
            </div>
            <p>Admin View Only.</p>
        </form>
        
    
</body>
</html>
