<?php

use App\Http\Controllers\Api\UserAuthenticationController;
use App\Http\Controllers\Api\AuthorsController;
use App\Http\Controllers\Api\AuthorsInvoicesController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [TestController::class, 'test']);

Route::post('/login', [UserAuthenticationController::class, 'login']);
Route::post('/register', [UserAuthenticationController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
Route::post('/logout', [UserAuthenticationController::class, 'logout']);


});
