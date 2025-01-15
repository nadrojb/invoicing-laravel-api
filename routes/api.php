<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);//users shouldn't be able to get to this end point if they are not logged in
//so I am checking that the user is authenticated before logging out



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
