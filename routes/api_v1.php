<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\UsersController;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->apiResource('/invoices', InvoiceController::class); //ensure in our invoice resources the request must include a sanctum token
Route::middleware('auth:sanctum')->apiResource('/users', UsersController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


