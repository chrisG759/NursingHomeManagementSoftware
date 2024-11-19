
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
        body{
            text-align: center;
            background-image:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('/homepageBackground.webp');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .linkButtons button{
            width: 5cm;
            height: 1cm;
            border-radius: 1cm;
            border: 0;
            
        }
        #login_but{
            background-color: rgb(70, 136, 172);
            color: white;
            margin-right: 12px;
        }
        #login_but, #signup_but:hover{
            cursor: pointer;
        }
        .content{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .greeting{
            color: white;
            margin-bottom: .5cm;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="greeting">
            <h1>Welcome to</h1>
            <h1>Dream Team's Nursing Home</h1>
        </div>
        <div class="linkButtons">
            <button id="login_but" onclick="window.location.href = '<?php echo route('login.index'); ?>'">Login</button>
            <button id="signup_but" onclick="window.location.href = '<?php echo route('signup.index'); ?>'">Sign Up</button>
        </div>
    </div>
</body>
</html>