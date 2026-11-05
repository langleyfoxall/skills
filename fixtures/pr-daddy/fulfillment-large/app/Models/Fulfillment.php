<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fulfillment extends Model
{
    protected $fillable = ['account_id', 'order_id', 'status', 'tracking_number'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
