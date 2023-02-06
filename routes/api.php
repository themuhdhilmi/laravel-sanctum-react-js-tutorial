<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('hello', fn() => 'hello');
Route::get('hello', [App\Http\Controllers\AuthController::class, 'hello'])->name('hello');

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('user',[AuthController::class, 'user']);
    Route::put('users/info',[AuthController::class, 'updateInfo']);
    Route::put('users/password',[AuthController::class, 'updatePassword']);
    Route::post('logout',[AuthController::class, 'logout']);

    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RoleController::class);
    Route::get('permission',[PermissionController::class, 'index']);
});

