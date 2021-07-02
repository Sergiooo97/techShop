<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/soft-ui-dashboard.css?v=1.0.2') }}" rel="stylesheet">
</head>
<body style="background: #2e8f57;">
    <div style="text-align: center;" class="container">
        <h1 style="color: #ffffff; margin-top: 3em;">SU COMPRA FUE EXITOSA</h1>
    <h3 style="color: #ffffff; margin-top: 2em;">{{$nom}}</h3>
        <a style="color: #ffffff; margin-top: 8em;" href="{{route('home')}}" class="btn btn-primary">
            VOLVER AL INICIO
        </a>
    </div>
</body>
</html>