<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
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

Route::get('/room', [RoomController::class, 'index']);
Route::get('/room/create', [RoomController::class, 'create']);
Route::get('/room/{id}/edit', [RoomController::class, 'edit']);
Route::post('/room', [RoomController::class, 'store']);
Route::get('/room/{id}', [RoomController::class, 'show']);
Route::put('/room/{id}', [RoomController::class, 'update']);
Route::delete('/room/{id}', [RoomController::class, 'destroy']);

Route::get('/', fn() => redirect('/login'));
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
