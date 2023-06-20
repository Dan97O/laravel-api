<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Hello</h1>
    <p>You have received a new message from the website:</p>
    <p>
        Name: {{ $lead->name }} <br>
        Email: {{ $lead->email }} <br>
        Message: <br>
        {{ $lead->message }}
    </p>
</body>

</html>
