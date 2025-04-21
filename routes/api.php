<?php

use App\Http\Controllers\DaysWorkNpdController;
use App\Http\Controllers\DaysSinceWarController;
use Carbon\Carbon;
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

Route::get('/server-time', function () {
    return response()->json([
        'server_time' => Carbon::now('Europe/Kyiv')->toDateTimeString(),
    ]);
});

Route::get('/days-since-war', DaysSinceWarController::class);
Route::get('/days-worked-in-npd', DaysWorkNpdController::class);
