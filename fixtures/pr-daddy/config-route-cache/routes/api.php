<?php

use App\Services\WebhookVerifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/webhooks/orders', function (Request $request, WebhookVerifier $verifier) {
    abort_unless($verifier->valid($request->header('X-Signature', '')), 403);

    return response()->noContent();
});
