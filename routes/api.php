<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfessionistController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ReviewController;


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

Route::post('professionists', [ProfessionistController::class, 'index']);
Route::get('professionists', [ProfessionistController::class, 'index']);

Route::get('data', [ProfessionistController::class, 'data']);

Route::get('professionists/{slug}', [ProfessionistController::class, 'show']);
Route::post('contacts', [LeadController::class, 'store']);
Route::post('reviews', [ReviewController::class, 'store']);

