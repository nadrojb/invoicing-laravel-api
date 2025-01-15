<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->apiResource('/invoices', InvoiceController::class); //ensure in our invoice resources the request must include a sanctum token

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


