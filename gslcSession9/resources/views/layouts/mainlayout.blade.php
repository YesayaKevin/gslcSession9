<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>GSLC - Session 9</title>
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen">
        @include('layouts.partials.navbar')
        @yield('content')
        @include('layouts.partials.footer')
    </body>
</html>
