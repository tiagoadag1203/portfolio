<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <script src="https://kit.fontawesome.com/3c0f3a3fc8.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    @vite(['resources/css/app.css'])
    <!-- <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/root.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/personalInfo.css') }}" rel="stylesheet"> -->
</head>

<body>
    @yield('conteudo')
</body>

</html>