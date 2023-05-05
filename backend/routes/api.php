<?php

use \App\Http\Controllers\Api\V1\Auth;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/register', Auth\RegisterController::class);
Route::post('auth/login', Auth\LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/profile', [Auth\ProfileController::class, 'show']);
    Route::put('auth/profile', [Auth\ProfileController::class, 'update']);
    Route::put('auth/password', Auth\PasswordUpdateController::class);
});
