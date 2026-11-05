<?php

use App\Http\Controllers\ExportDownloadController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->get('/exports/{export}/download', ExportDownloadController::class);
