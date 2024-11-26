<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Praktikum 8')</title>
    @stack('styles-home')
    @stack('contacts')
    <link rel="stylesheet" href="{{ asset('styles/master.css') }}" >
</head>
<body>
    <div class="navbar">    
        <nav class="navbar-items">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>
        </nav>
    </div>
    

    <main>
        @yield('content')
    </main>

   
    

    
    
    <div class="footer">
        <footer>
            &copy;
        </footer>
    </div>
</body>
</html>
