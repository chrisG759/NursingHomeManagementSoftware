<html>
<head>
    <title>Project Login Form</title>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <style>
        * {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: sans-serif;
} 

.container {
    margin: 50px auto;
    max-width: 500px;
    background-color: #fff;
    padding: 30px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
}

h1 {
    text-align: center;
    font-size: 36px;
    margin-bottom: 30px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 18px;
    margin-bottom: 5px;
}

input[type="text"], 
input[type="password"]{
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
}


.check {
    margin-bottom: 10px;
}

.check label {
    margin-top: 5px;
}

input[type="submit"] {
    padding: 10px;
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 18px;
    background-color: #007bff;
    cursor: pointer;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
}

input[type="sumbit"]:hover {
    background-color: #0062cc; 
}
#invalidLogin{
    color: red;
    margin-bottom: 12px;
}
    </style>
</head>
<body>

    <div class="container">
        <h1>Login Form</h1>
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <label for="username">Email:</label>
            <input type="text" name="email" placeholder="Enter your email">
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter your password">
            @if ($loginInvalid == true)
                <p id="invalidLogin">Invalid Login</p>   
            @endif
            <div class="check">
                <input type="checkbox" name="remember">
                <label for="remember">Remember Me</label>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>


</body>
</html>
