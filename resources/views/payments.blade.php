<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payments</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            width: 5cm;
            justify-content: center;
            align-items: center;
            justify-content: center;
        }
        form, div{
            margin-bottom: 1cm;
        }
    </style>
</head>
<body>
    <form action="">
        <label for="">Payment ID: </label>
        <input type="text" readonly style="margin-bottom: .5cm">
        <label for="">Total Due: </label>
        <input type="text" readonly style="margin-bottom: .5cm">
        <label for="">New Payment: </label>
        <input type="text" readonly style="margin-bottom: .5cm">
        <div id="confirmation-buttons">
            <input type="submit" value="Ok">
            <button id="cancel">Cancel</button>
        </div>
    </form>
</body>
</html>