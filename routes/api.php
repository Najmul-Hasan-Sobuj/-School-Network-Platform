<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserVerificationControleer;

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

Route::prefix('v1')->namespace('Api')->group(function () {

    // Route::post('/register', [UserController::class, 'register']);
    // Route::post('/login', [UserController::class, 'login']);
    // Route::post('/password/reset', [UserController::class, 'passwordReset']);
    // Route::post('/password/resetConfirm', [UserController::class, 'resetConfirm']);

    // Route::middleware('auth:api')->group(function () {
    //     Route::post('/logout', [UserController::class, 'logout']);
    //     Route::get('/profile', [UserController::class, 'profile']);
    //     Route::post('/profile', [UserController::class, 'updateProfile']);
    //     Route::post('change-password', [UserController::class, 'changePassword']);
    // });
});
