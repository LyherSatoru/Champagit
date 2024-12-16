<?php

namespace App\Http\Controllers\Discord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\DiscordService;
class BuyRankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $discordService;
    protected $discordToken;

    public function __construct(DiscordService $discordService)
    {
        $this->discordToken = env('DISCORD_BOT_TOKEN');
    }
    public function index()
    {
        try {
            $userId = '459154624230719489';
            $message = 'hello world';
            $discordToken = 'MTA0MDkwMzA2NDkyNTc3Mzg3NQ.G5kF7p.XPQKJ3sqVTf73ykFAbTBtSgvYvPbgPHItDek5M';
        
            // Make sure the userId is valid for sending a DM
            $url = "https://discord.com/api/v10/channels/{$userId}/messages"; // Correct endpoint for DM
            $response = Http::withHeaders([
                'Authorization' => "Bot {$discordToken}",
                'Content-Type' => 'application/json',
            ])->post($url, [
                'content' => $message,
            ]);
        
            // Check if the request was successful
            if ($response->successful()) {
                \Log::info('Discord API Response:', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return $response->successful();
            } else {
                // Log the error response if not successful
                \Log::error('Discord API error:', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return response()->json(['error' => 'Failed to send message.'], 500);
            }
        } catch (\Exception $e) {
            \Log::error('Discord message error: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
