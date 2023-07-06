<?php

use App\Http\Controllers\LogEventController;
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

Route::post('/', [LogEventController::class, 'saveEvent']);

Route::get('/events', [LogEventController::class, 'getEventsDB']);
Route::get('/events_file/', [LogEventController::class, 'getEventsFile']);
