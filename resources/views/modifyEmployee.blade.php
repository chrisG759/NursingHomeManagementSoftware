<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Employee</title>
</head>
<body>
    <h1>Update Employee</h1>
    <form action="{{ route('employees.update', $employee->employeeID) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" value="{{ $employee->first_name }}"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" value="{{ $employee->last_name }}"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="{{ $employee->email }}"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value="{{ $employee->password }}"></td>
            </tr>
            <tr>
                <td>Salary</td>
                <td><input type="text" name="salary" value="{{ $employee->salary ?? "Not Set" }}"></td>
            </tr>
        </table>
        <input type="submit" value="Update Employee">
    </form>
</body>
</html>