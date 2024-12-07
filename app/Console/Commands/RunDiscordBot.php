<?php

namespace App\Console\Commands;

use Discord\Discord;
use Discord\WebSockets\Event;
use Illuminate\Console\Command;

class RunDiscordBot extends Command
{
    protected $signature = 'discord:run';
    protected $description = 'Run the Discord bot';

    public function handle()
    {
        $discord = new Discord([
            'token' => config('services.discord.token'),
        ]);

        $discord->on('ready', function ($discord) {
            $this->info("Bot is ready!");

            // Respond to messages
            $discord->on(Event::MESSAGE_CREATE, function ($message) {
                echo "Message received: " . $message->content . PHP_EOL; // Log all received messages
            
                if ($message->content === '!ping') {
                    $message->reply('Pong!');
                }
            
                if ($message->content === '?hi') {
                    $message->reply('Hello!');
                }
            });
            
        });

        $discord->run();
    }
}
