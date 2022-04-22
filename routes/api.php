<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthJWTController;

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

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthJWTController::class, 'login']);
    Route::post('register', [AuthJWTController::class, 'register']);
});

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AuthJWTController::class, 'logout']);

    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'show']);
    });
});