<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>

    </style>
</head>
<body>
    <h1>Login</h1>
    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        Email: <input type="text" name="email">
        Password: <input type="text" name="password">
        <input type="submit" name="submit">
    </form>
</body>
</html>