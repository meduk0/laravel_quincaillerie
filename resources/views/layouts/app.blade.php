<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Product Manager')</title>
    <link href="{{ asset('css/crud_app.css') }}" rel="stylesheet" type="text/css" />
    
</head>
<body class="grid" style="min-height: 100vh;">
    @include('components.navbar')

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>