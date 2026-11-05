<?php

use App\Http\Controllers\CustomerImportController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->post('/customers/import', [CustomerImportController::class, 'store']);
