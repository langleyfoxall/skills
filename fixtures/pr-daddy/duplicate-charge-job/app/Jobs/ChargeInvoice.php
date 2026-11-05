<?php

namespace App\Jobs;

use App\Models\Invoice;
use App\Services\PaymentGateway;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ChargeInvoice implements ShouldQueue
{
    use Dispatchable;
    use Queueable;

    public int $tries = 5;

    public int $timeout = 5;

    public function __construct(public Invoice $invoice)
    {
    }

    public function handle(PaymentGateway $gateway): void
    {
        $gateway->charge($this->invoice);
        $this->invoice->update(['paid_at' => now()]);
    }
}
