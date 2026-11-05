<?php

use App\Http\Controllers\ApiTokenController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/tokens', [ApiTokenController::class, 'index']);
