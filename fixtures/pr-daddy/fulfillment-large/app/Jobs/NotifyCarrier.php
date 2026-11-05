<?php

namespace App\Jobs;

use App\Models\Fulfillment;
use App\Services\CarrierClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyCarrier implements ShouldQueue
{
    use Dispatchable;
    use Queueable;

    public int $tries = 3;

    public function __construct(public Fulfillment $fulfillment)
    {
    }

    public function handle(CarrierClient $carrier): void
    {
        $carrier->createShipment($this->fulfillment->tracking_number);
    }
}
