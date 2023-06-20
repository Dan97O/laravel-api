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
    <p>hai ricevuto un nuovo messaggio dal sito</p>
    <p>
        nome: {{ $lead->name }} <br>
        Email: {{ $lead->email }} <br>
        Messaggio: <br>
        {{ $lead->message }}
    </p>
</body>

</html>
