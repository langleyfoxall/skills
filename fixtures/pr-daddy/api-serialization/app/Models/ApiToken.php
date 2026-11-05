<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
