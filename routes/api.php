<?php

use App\Http\Controllers\Auth\AccessTokenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('tokens', [AccessTokenController::class, 'index']);
Route::delete('tokens', [AccessTokenController::class, 'destroyAll']);
Route::post('login', [AccessTokenController::class, 'store']);
Route::post('logout', [AccessTokenController::class, 'destroy']);
