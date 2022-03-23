<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::post('/users/login', [LoginController::class, 'store']);
Route::post('/users/logout', [LoginController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', [LoginController::class, 'show']);
