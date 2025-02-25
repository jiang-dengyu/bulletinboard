@extends('layouts.app')

@section('title', '即時聊天')

@section('content')
    <div class="container">
        <h1>聊天室</h1>
        <div id="chat-box">
            <p>等待新訊息...</p>
        </div>
        <button onclick="sendMessage()" class="btn btn-primary mt-3">發送測試訊息</button>
    </div>
@endsection

@section('scripts')
    <!-- 引入 Socket.IO & Laravel Echo -->
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.2/echo.iife.min.js"></script>

    <script>
        const socket = io("http://localhost:6001");

        window.Echo = new Echo({
            broadcaster: 'socket.io',
            host: window.location.hostname + ':6001'
        });

        window.Echo.channel('chat')
            .listen('MessageSent', (e) => {
                console.log('收到訊息:', e.message);
                let chatBox = document.getElementById("chat-box");
                let newMessage = document.createElement("p");
                newMessage.textContent = e.message;
                chatBox.appendChild(newMessage);
            });

        function sendMessage() {
            fetch("http://localhost:8000/websocket/send", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ message: "Hello WebSocket" })
            });
        }
    </script>
@endsection
