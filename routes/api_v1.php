<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\AuthorsController;
use App\Http\Controllers\Api\V1\AuthorsInvoicesController;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->apiResource('/invoices', InvoiceController::class); //ensure in our invoice resources the request must include a sanctum token
Route::middleware('auth:sanctum')->apiResource('/authors', AuthorsController::class);
//Route::middleware('auth:sanctum')->apiResource('/users.invoices', AuthorsInvoicesController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


