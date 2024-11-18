
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
        }
        #login_but, #signup_but:hover{
            cursor: pointer;
        }
        .content{
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="greeting">
            <h2>Welcome to</h2>
            <h2>Dream Team's Nursing Home</h2>
        </div>
        <div class="linkButtons">
            <button id="login_but" onclick="window.location.href = '<?php echo route('login'); ?>'">Login</button>
            <button id="signup_but" onclick="window.location.href = '<?php echo route('signup'); ?>'">Sign Up</button>
        </div>
    </div>
</body>
</html>