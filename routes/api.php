<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('showData', [App\Http\Controllers\HomeController::class, 'showData']);
Route::post('insert', [App\Http\Controllers\HomeController::class, 'insert']);
Route::delete('delete/{id}', [App\Http\Controllers\HomeController::class, 'delete']);
Route::get('edit/{id}', [App\Http\Controllers\HomeController::class, 'edit']);
