<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop\ShopModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

    }
    public function shop(Request $request)
    {
        try {
            $rank = $request->query('rank');

            if($rank == 'economy' || $rank == 'plot') {
                
                return view('page.shop.rank_shop.index', compact('rank'));
            }else {
                return view('home');
            }
        } catch (\Exception $e) {
            // logger('Error during index process: ' . $e->getMessage());
            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function receipt(request $request, $id)
    {
        // dd($id);
        $receipt = ShopModel::where('receipt_uuid', $id)->firstOrFail();
        return view('page.shop.rank_shop.receipt', compact('receipt'));
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
        try {

            // Validate the request data
            $validatedData = $request->validate([
                'username' => 'required|string',
                'Platform' => 'required|string',
                'rank' => 'required|string',
                'price' => 'required',
                'server_check' => 'required',
                'payment' => 'required|image|mimes:jpeg,png,jpg',
            ]);

            // Handle file upload
            $filePath = null;
            if ($request->hasFile('payment')) {
                $file = $request->file('payment');
                $fileName = time() . '_' . $file->getClientOriginalName(); // Unique file name
                $filePath = $file->move(public_path('assets/img/upload'), $fileName); // Move file to desired folder
            }
            $value = $request->price;
            // $value = '10$';
            $cleanedValue = str_replace('$', '', $value);
            if($validatedData['rank'] == 'PLOT_VIP') {
                $rank_name = 'VIP';
            }elseif($validatedData['rank'] == 'PLOT_KING') {
                $rank_name = 'KING';
            }else{
                $rank_name = $validatedData['rank'];
            }
            // Insert data into the database
            $shop = ShopModel::create([
                'username' => $validatedData['username'],
                'game_name' => $validatedData['username'],
                'platform' => $validatedData['Platform'],
                'rank' => $rank_name,
                // 'server_check' => $validatedData['server-check'],
                'price' => $cleanedValue,
                'image_url' => $fileName ?? null, // Save only the file name for later reference
            ]);

            // Refresh the model to retrieve fields updated by the database trigger
            $shop->refresh();

            // Send a message to Discord
            try {
                $arrow = '<a:96c94f419fa94bdbbee73dd38813d81f:1313709808708489226>';
                $webhookUrl = env('DISCORD_WEBHOOK_URL');
                $message = [
                    'content' => '',
                    'username' => 'Champa Shop',
                    'embeds' => [
                        [
                            'title' => 'Receipt ' . $shop->receipt_uuid . ' <a:DT_adiamond:1215221994602237983>',
                            'description' =>
                                $arrow . " Username: " . $shop->username . "\n" .
                                $arrow . " Platform: " . $shop->platform . "\n" .
                                $arrow . " Server : " . $validatedData['server_check'] . "\n" .
                                $arrow . " Rank: " . $shop->rank . "\n" .
                                $arrow . " Price: " . $shop->price . "$",
                            'image' => [
                                'url' => asset('assets/img/upload/' . $fileName), // Publicly accessible file path
                            ],
                        ],
                    ],
                ];

                Http::post($webhookUrl, $message);
            } catch (\Exception $e) {
                // Log error if Discord message fails
                logger('Error sending message to Discord: ' . $e->getMessage());
            }

            // Return to the receipt page with the receipt_uuid
            // $receipt = ShopModel::where('receipt_uuid', $shop->receipt_uuid)->firstOrFail();
            // return view('page.shop.rank_shop.receipt',compact('receipt'));
            return redirect()->route('shop.receipt', ['receipt_uuid' => $shop->receipt_uuid]);

        } catch (\Exception $e) {
            // Log any error that occurs during the store process
            logger('Error during store process: ' . $e->getMessage());

            // Optionally, return an error message
            return redirect()->back()->with('error', $e->getMessage());
        }
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
