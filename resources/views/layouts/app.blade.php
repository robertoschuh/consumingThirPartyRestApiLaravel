<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test formWithReastApi</title>
    <link rel="stylesheet" href="/css/app.css" />
</head>
<body>

    <div class="container">
        @include('presets.nav_bar')
        @include('flash-messages.flash-message')
        @yield('content')    
    </div>

    <script src="/js/app.js"></script>

   <?php //inyecting JS code from child view ?>
    @yield('js')
</body>
</html>