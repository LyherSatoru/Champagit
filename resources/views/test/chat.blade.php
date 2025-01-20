<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discord Chat</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
</head>

<body>
    <h1>Live Chat with Discord</h1>
    <div id="messages"></div>
    <form id="chatForm">
        <input type="text" id="message" placeholder="Type a message" required>
        <button type="submit">Send</button>
    </form>

    <script>
        const messagesDiv = document.getElementById('messages');
        const chatForm = document.getElementById('chatForm');

        // Send message to Laravel, which forwards it to Discord
        chatForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const message = document.getElementById('message').value;
            axios.post('/send-message', {
                    message
                })
                .then(() => {
                    messagesDiv.innerHTML += `<p>You: ${message}</p>`;
                    document.getElementById('message').value = '';
                })
                .catch(console.error);
        });

        document.addEventListener('DOMContentLoaded', function () {
            const messagesDiv = document.getElementById('messages');

            // Set up Laravel Echo for real-time updates
            const echo = new Echo({
                broadcaster: 'pusher',
                key: '{{ env('PUSHER_APP_KEY') }}',
                cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
                forceTLS: true,
            });

            echo.channel('chat').listen('MessageReceived', (e) => {
                messagesDiv.innerHTML += `<p>Discord: ${e.message}</p>`;
            });
        });
    </script>
    <script>
        const beamsClient = new PusherPushNotifications.Client({
            instanceId: 'c346a70e-ae56-435a-a64a-df0a4039decd',
        });

        beamsClient.start()
            .then(() => beamsClient.addDeviceInterest('hello'))
            .then(() => console.log('Successfully registered and subscribed!'))
            .catch(console.error);
    </script>
</body>

</html>