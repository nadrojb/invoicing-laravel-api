<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function() {
    return response()->json([
        'message' => 'Hello World!'
    ], 200);
});

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customer/{customer}', [CustomerController::class, 'show']);
Route::get('/invoices', [InvoiceController::class, 'index']);
Route::get('/invoice/{invoice}', [InvoiceController::class, 'show']);
