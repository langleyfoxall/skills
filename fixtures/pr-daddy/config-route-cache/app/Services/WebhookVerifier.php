<?php

namespace App\Services;

class WebhookVerifier
{
    public function valid(string $signature): bool
    {
        return hash_equals(env('WEBHOOK_SECRET'), $signature);
    }
}
