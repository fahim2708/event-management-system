<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E M S</title>
    <script src="https://kit.fontawesome.com/97a1f18299.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    @vite('resources/css/app.css')
</head>

    <body class="bg-gray-200 font-mono">
        <nav class="bg-white flex justify-between font-semibold text-green-950">
            <ul class="flex items-center">
                <li class="p-3 md:p-6"><a href="{{ route('home') }}">Event Calendar</a></li>
                @auth
                <li class="p-3 md:p-6"><a href="{{ route('event') }}">Events</a></li>
                @endauth
            </ul>
            <ul class="flex items-center">
                @auth
                <li class="p-3 md:p-6">{{ auth()->user()->name }}</li>
                <form action="{{ route('logout') }}" method="POST" class="p-3 md:p-6">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                @endauth
                @guest
                <li class="p-3 md:p-6"><a href="{{ route('login') }}">Login</a></li>
                <li class="p-3 md:p-6"><a href="{{ route('register') }}">Register</a></li>
                @endguest
            </ul>
        </nav>
        <div class="container mx-auto mt-6">
            @yield('content')
        </div>
    </body>



</html>
