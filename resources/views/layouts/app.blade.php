<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <nav class="navbar">
        <div class="nav-left">
            <span class="welcome-text">Welcome</span>
        </div>
        <div class="nav-right">
            <a href="{{ route('member.index') }}" class="btn-nav">Member</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} My Website</p>
    </footer>
</body>
</html>
