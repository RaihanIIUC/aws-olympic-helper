<?php

use App\Http\Controllers\SentSmsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/sms', [SentSmsController::class, 'sms'])->name('sms');
Route::post('/query', [SentSmsController::class, 'SearchByDate'])->name('query');
Route::get('/hello', [SentSmsController::class, 'hello']);
