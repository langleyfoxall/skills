<?php

it('dispatches a charge job', function (): void {
    Queue::fake();

    ChargeInvoice::dispatch($invoice);

    Queue::assertPushed(ChargeInvoice::class);
});
