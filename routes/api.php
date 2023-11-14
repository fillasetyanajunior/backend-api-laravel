<?php

use App\Http\Controllers\Api\CommissionController as Commission;
use App\Http\Controllers\Api\PaymentController as Payment;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/commission', [Commission::class, 'index']);

Route::get('/payment', [Payment::class, 'index']);
Route::post('/payment', [Payment::class, 'create']);
Route::post('/payment/store/{payment_number}', [Payment::class, 'store']);
