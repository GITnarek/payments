<?php

use App\Http\Controllers\GatewayOneController;
use App\Http\Controllers\GatewayTwoController;
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

Route::post('/gateway-one/callback', [GatewayOneController::class, 'handleCallback']);
Route::post('/gateway-two/callback', [GatewayTwoController::class, 'handleCallback']);
Route::post('/gateway-two/callback', [GatewayTwoController::class, 'handleCallback']);
