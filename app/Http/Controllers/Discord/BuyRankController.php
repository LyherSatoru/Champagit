<?php

namespace App\Http\Controllers\Discord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BuyRankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $arrow = '<a:96c94f419fa94bdbbee73dd38813d81f:1313709808708489226>';
            $webhookUrl = 'https://discord.com/api/webhooks/1313535682118942780/kE2lOz5yZT7HRKIZ1KOf72M1Y1doDIRnJV84PQEyO-z63pcK4IGTCP4un9QqbKQ45kP8'; // Replace with your webhook URL
            $message = [
                'content' => '', // The message content
                'username' => 'Champa Shop',       // Optional: Set bot's name
                'embeds' => [
                    [
                        'title' => 'Receipt CN-001 <a:DT_adiamond:1215221994602237983>', // Optional: Embed title
                        'description' => $arrow."Username: Lyher\n".$arrow."GameName: LyherGaming99\n".$arrow."Rank: GM\n".$arrow."Price: 99$", // Embed description with new lines
                        'image' => [
                            'url' => 'image_url', // Image URL
                        ],
                    ],
                ],
            ];

            // Send the POST request
            $response = Http::post($webhookUrl, $message);

            if ($response->successful()) {
                // return response()->json(['message' => 'Message sent successfully']);
                echo 'successfully';

            } else {
                // return response()->json(['error' => 'Failed to send message'], 500);
                echo 'error message';

            }
            // echo 'successfully';
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
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
