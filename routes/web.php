<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apps\AppsController as AppController;
use App\Http\Controllers\Apps\QrController as QrController;
use App\Http\Controllers\Discord\BuyRankController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\shop\ShopController;
use App\Http\Controllers\about\AboutUsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\shop\StoreController;
use App\Http\Controllers\Discord\LiveMessageController;

// update 
Route::get('/', function () {
    return view('home');
})->name('home');


Route::prefix('apps')->group(function () {
    Route::get('/', [QrController::class, 'index'])->name('app');
    Route::get('qr', [QrController::class, 'qr'])->name('app.qr');



    // Route::post('loginattempt', [AppsController::class, 'loginattempt'])->name('adminportal.loginattempt');
    // Route::get('createaccount', [AppsController::class, 'createaccount'])->name('adminportal.createaccount');
});

Route::prefix('dc')->group(function () {
    // Route::get('/', [BuyRankController::class, 'index'])->name('dc');
    Route::resource('/', BuyRankController::class)->names('dc');

    // Route::get('qr', [QrController::class, 'qr'])->name('app.qr');



    // Route::post('loginattempt', [AppsController::class, 'loginattempt'])->name('adminportal.loginattempt');
    // Route::get('createaccount', [AppsController::class, 'createaccount'])->name('adminportal.createaccount');
});

// admin
Route::prefix('admin-chompa-network')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('app');
    Route::get('qr', [AdminController::class, 'qr'])->name('app.qr');



    // Route::post('loginattempt', [AppsController::class, 'loginattempt'])->name('adminportal.loginattempt');
    // Route::get('createaccount', [AppsController::class, 'createaccount'])->name('adminportal.createaccount');
});


// shop
Route::prefix('shop')->group(function () {
    // Route::get('/', [BuyRankController::class, 'index'])->name('dc');
    Route::resource('/', ShopController::class)->names('shop');
    Route::get('/rank', [ShopController::class, 'shop'])->name('shop.rank');
    Route::get('/receipt/{receipt_uuid}', [ShopController::class, 'receipt'])->name('shop.receipt');
    // Route::get('/receipt/{receipt_uuid}', [ReceiptController::class, 'download'])->name('receipt.download');

});

// about us
Route::prefix('about-us')->group(function () {
    // Route::get('/', [BuyRankController::class, 'index'])->name('dc');
    Route::resource('/', AboutUsController::class)->names('about');
    // Route::get('/receipt/{receipt_uuid}', [ShopController::class, 'receipt'])->name('shop.receipt');
    // Route::get('/receipt/{receipt_uuid}', [ReceiptController::class, 'download'])->name('receipt.download');

});


// shop
Route::prefix('minecraft-store')->middleware('auth')->group(function () {
    // Route::get('/', [BuyRankController::class, 'index'])->name('dc');
    Route::resource('/', StoreController::class)->names('minecraft-store');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

// routes/web.php
Route::post('/send-message', [LiveMessageController::class, 'sendMessage']);
Route::post('/webhook', [LiveMessageController::class, 'receiveMessage']);
Route::get('/chat-me', [LiveMessageController::class, 'chat']);
