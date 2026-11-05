<?php

namespace App\Policies;

use App\Models\Fulfillment;
use App\Models\User;

class FulfillmentPolicy
{
    public function update(User $user, Fulfillment $fulfillment): bool
    {
        return $user->account_id === $fulfillment->account_id;
    }
}
