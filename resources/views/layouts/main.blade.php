<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/multiselect.css')}}">
    <title>Document</title>
</head>
<body>
    @yield('content')
    <script src="{{ asset("js/app.js") }}"></script>
    <script src="{{ asset("js/script.js") }}"></script>
    <script src="{{ asset("js/multiselect.js") }}"></script>

</body>
</html>
