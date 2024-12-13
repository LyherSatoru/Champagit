<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apps\AppsController as AppController;
use App\Http\Controllers\Apps\QrController as QrController;
use App\Http\Controllers\Discord\BuyRankController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\shop\ShopController;
use App\Http\Controllers\about\AboutUsController;
use Jakyeru\Larascord\Facades\Larascord;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});




Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/larascord/callback', function () {
//     return view('dashboard');

// })->name('home');
Route::get('/larascord/redirect', function () {
    return Larascord::redirect();
});

Route::get('/larascord/callback', function () {
    $discordUser = Larascord::user();

    if (!$discordUser) {
        return redirect('/')->with('error', 'Failed to authenticate with Discord.');
    }

    // Save the user to the database
    $user = User::updateOrCreate(
        ['discord_id' => $discordUser->id],
        [
            'name' => $discordUser->username,
            'email' => $discordUser->email ?? null, // Discord might not provide an email
            'avatar' => $discordUser->avatar,
        ]
    );

    // Log the user into your application
    auth()->login($user);

    return redirect('/home')->with('success', 'Logged in successfully!');
});












Route::prefix('apps')->group(function () {
    Route::get('/', [QrController::class, 'index'])->name('app');
    Route::get('qr', [QrController::class, 'qr'])->name('app.qr');
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