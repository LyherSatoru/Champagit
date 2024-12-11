<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\RecieptController;


Route::get('customer001', [RecieptController::class, 'customer001'])->name('customer001');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
