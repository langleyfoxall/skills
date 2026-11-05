<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/orders', [OrderController::class, 'index']);
