<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'Laravel project') }} - @yield('title', 'Page') </title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    @yield('css')

</head>

<body>
    <div id="app">

        <div class="wrapper">
            @include('layouts.partials.header')

            <main class="">
                @yield('content')
            </main>

            @include('layouts.partials.footer')
        </div>

        @auth
        <script>
            const logoutLink = document.getElementById('logout-link');
            const logoutForm = document.getElementById('logout-form');

            logoutLink.addEventListener('click', (e) => {
                e.preventDefault();
                logoutForm.submit();
            });
        </script>
        @endauth
        @yield('js')

    </div>
</body>

</html>