<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apps\AppsController as AppController;
use App\Http\Controllers\Apps\QrController as QrController;
use App\Http\Controllers\Discord\BuyRankController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\shop\ShopController;
Route::get('/', function () {
    return view('home');
});


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
    Route::get('/receipt/{receipt_uuid}', [ShopController::class, 'receipt'])->name('shop.receipt');
    // Route::get('/receipt/{receipt_uuid}', [ReceiptController::class, 'download'])->name('receipt.download');

});