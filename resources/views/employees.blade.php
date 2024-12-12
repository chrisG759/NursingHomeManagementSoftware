<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
</head>
<body>
    <h1>Employees</h1>
    <table>
        <tr>
            <td>Employee ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Salary</td>
            <td>Actions</td>
        </tr>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->employeeID }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->password }}</td>
                <td>{{ $employee->salary ?? "Not Set" }}</td>
                <td>
                    <form action="{{ route('employees.show', $employee->employeeID) }}">
                        @csrf
                        <input type="submit" value="Modify">
                    </form>
                </td>
                <td>
                    <form action="{{ route('employees.destroy', $employee->employeeID )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>