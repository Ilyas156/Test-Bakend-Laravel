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

Route::post(
    '/gatewayOne/changePaymentStatus',
    [GatewayOneController::class, 'changePaymentStatus']
)->middleware(['throttle:gwOne', 'gw.one.ensureSignatureIsValid']);

Route::post(
    '/gatewayTwo/changePaymentStatus',
    [GatewayTwoController::class, 'changePaymentStatus']
)->middleware(['throttle:gwTwo', 'gw.two.ensureSignatureIsValid']);

