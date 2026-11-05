<?php

it('accepts a signed webhook', function (): void {
    $this->postJson('/api/webhooks/orders', [], ['X-Signature' => 'test'])
        ->assertNoContent();
});
