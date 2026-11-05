<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $casts = [
        'started_at' => 'immutable_datetime',
    ];
}
