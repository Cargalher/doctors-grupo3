<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Orders\OrderController;
use App\Http\Controllers\SponsorController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API Utenti
Route::get('doctors', 'API\DoctorController@index');


// API Pagamenti

Route::get('sponsors', [SponsorController::class, 'index']);
Route::get('orders/generate', [OrderController::class, 'generate']);
Route::post('orders/makepayment', [OrderController::class, 'makePayment']);
