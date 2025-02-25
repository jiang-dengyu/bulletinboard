<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css'])
    @yield('styles')
</head>
<body>
    <nav class="navbar">
        <div class="nav-left">
            <span class="welcome-text">Welcome</span>
        </div>
        <div class="nav-right">
            <a href="{{ route('home') }}" class="btn-nav">Main Page</a>
            <a href="{{ route('member.index') }}" class="btn-nav">Member</a>
            <a href="{{ route('queue.test') }}" class="btn-nav">Queue Test</a>
            <a href="{{ route('sftp.test') }}" class="btn-nav">SFTP Test</a>
            <a href="{{ route('chat.index') }}" class="btn-nav">Chat</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} My Website</p>
    </footer>
    @yield('scripts')
</body>
</html>
