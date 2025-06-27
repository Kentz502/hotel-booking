<?php

use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/hotel', [HotelController::class, 'index']);
Route::get('/hotel/create', [HotelController::class, 'create']);
Route::get('/hotel/{id}', [HotelController::class, 'edit']);
Route::post('/hotel', [HotelController::class, 'store']);
Route::put('/hotel/{id}', [HotelController::class, 'update']);
Route::delete('/hotel/{id}', [HotelController::class, 'destroy']);
