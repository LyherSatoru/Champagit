<?php

namespace App\Http\Controllers\Discord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Discord\Discord;
use Discord\Parts\Channel\Message;

class LiveMessageController extends Controller
{
    // Send message to Discord
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $discord = new Discord([
            'token' => env('DISCORD_BOT_TOKEN'),
        ]);

        $discord->on('ready', function ($discord) use ($validated) {
            $channel = $discord->getChannel(env('DISCORD_CHANNEL_ID'));
            $channel->sendMessage($validated['message'])->done(function (Message $message) use ($discord) {
                $discord->close();
            }, function (\Exception $e) {
                \Log::error('Failed to send message to Discord: ' . $e->getMessage());
            });
        });

        $discord->run();

        return response()->json(['message' => 'Message sent to Discord!']);
    }

    // Receive message from Discord webhook
    public function receiveMessage(Request $request)
    {
        $data = $request->all();
        // Log or process the message
        \Log::info('Message from Discord:', $data);

        // Broadcast to front-end (optional, using Laravel Echo)
        event(new \App\Events\MessageReceived($data['content'] ?? ''));

        return response()->json(['status' => 'Message received']);
    }

    public function chat()
    {
        return view('test.chat');
    }
}