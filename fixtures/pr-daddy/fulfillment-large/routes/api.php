<?php

use App\Http\Controllers\FulfillmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->apiResource('fulfillments', FulfillmentController::class);
