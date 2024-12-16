<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordService
{
    protected $discordToken;

    public function __construct()
    {
        $this->discordToken = env('DISCORD_BOT_TOKEN'); // Add your bot token in .env
    }

    public function sendPrivateMessage($userId, $message)
    {
        // Discord API endpoint to send direct messages
        $url = "https://discord.com/api/v10/users/{$userId}/messages";

        $response = Http::withHeaders([
            'Authorization' => "Bot {$this->discordToken}",
        ])->post($url, [
            'content' => $message,
        ]);

        return $response->successful();
    }
}
