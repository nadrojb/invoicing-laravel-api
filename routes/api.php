<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers', [CustomerController::class, 'index']);
