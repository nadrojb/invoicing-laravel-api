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
Route::middleware('auth:sanctum')->post('/logout', [UserAuthenticationController::class, 'logout']); // users shouldn't be able to get to this endpoint if they are not logged in


Route::middleware('auth:sanctum')->group(function () {


    Route::apiResource('/invoices', InvoiceController::class)->except(['update']); // ensure the request includes a sanctum token
    Route::put('invoices/{invoice}', [InvoiceController::class, 'replace']);
    Route::patch('invoices/{invoice}', [InvoiceController::class, 'update']);

    Route::apiResource('/authors', AuthorsController::class);
    Route::apiResource('/authors.invoices', AuthorsInvoicesController::class)->except(['update']);
    Route::put('authors/{author}/invoices/{invoice}', [AuthorsInvoicesController::class, 'replace']);
    Route::patch('authors/{author}/invoices/{invoice}', [AuthorsInvoicesController::class, 'update']);
});
