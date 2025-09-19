<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Realtime Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        #messages {
            border: 1px solid #ccc;
            padding: 10px;
            height: 300px;
            overflow-y: auto;
            margin-bottom: 10px;
        }

        #input {
            display: flex;
            gap: 10px;
        }

        input {
            flex: 1;
            padding: 8px;
        }

        button {
            padding: 8px 15px;
        }
    </style>
</head>

<body>
    <h2>Realtime Chat 🚀</h2>
    <div id="messages"></div>

    <div id="input">
        <input type="text" id="message" placeholder="Type a message...">
        <button onclick="sendMessage()">Send</button>
    </div>

    <!-- Laravel Echo + Pusher -->
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pusher-js@8.2.0/dist/web/pusher.min.js"></script>

    <script>
        // إعداد Laravel Echo مع Reverb
        window.Echo = new Echo({
            broadcaster: 'reverb',
            key: 'app-key',
            wsHost: window.location.hostname,
            wsPort: 8080,
            wssPort: 8080,
            forceTLS: false,
            enabledTransports: ['ws', 'wss'],
        });

        // الاستماع للرسائل
        window.Echo.channel('chat')
            .listen('MessageSent', (e) => {
                let box = document.getElementById('messages');
                box.innerHTML += `<p><b>User:</b> ${e.message}</p>`;
                box.scrollTop = box.scrollHeight;
            });

        // إرسال الرسائل
        function sendMessage() {
            let msg = document.getElementById('message').value;
            if (!msg) return;

            fetch('/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    message: msg
                })
            });

            document.getElementById('message').value = '';
        }
    </script>
</body>

</html>
