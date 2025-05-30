<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return '©' .  Carbon\Carbon::now()->format('Y') . ' ' . env('APP_NAME');
});

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    //->middleware('guest')
    ->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

//RUTAS AUTENICADAS
$router->group(['middleware' => ['auth:sanctum']], function () {

    // Permisos
    Route::post('permisos/asignar/{permission}', [PermissionController::class, 'assign']);
    Route::post('permisos/quitar/{permission}', [PermissionController::class, 'deny']);
    Route::apiResource('permisos', PermissionController::class)->only(['index']);

    //Roles
    Route::apiResource('roles', RoleController::class)->only(['index', 'store', 'destroy'])->parameter('roles', 'rol');

    //Usuarios
    Route::get('users/me', [UserController::class, 'me']);
    Route::apiResource('users', UserController::class)->parameter('users', 'user');
});