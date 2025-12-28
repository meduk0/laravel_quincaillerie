<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title','MISSED')</title>
</head>
<body>
    <h1>Data:</h1>
        <ul>
            @yield('forloop','MISSING')
        </ul>
</body>
</html>