<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\AuthorsController;
use App\Http\Controllers\Api\V1\AuthorsInvoicesController;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/invoices', InvoiceController::class);//ensure in our invoice resources the request must include a sanctum token
    Route::put('invoices/{invoice}', [InvoiceController::class, 'replace']);

    Route::apiResource('/authors', AuthorsController::class);
    Route::apiResource('/authors.invoices', AuthorsInvoicesController::class);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});



