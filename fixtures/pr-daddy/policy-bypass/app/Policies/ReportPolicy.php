<?php

namespace App\Policies;

use App\Models\Report;
use App\Models\User;

class ReportPolicy
{
    public function update(User $user, Report $report): bool
    {
        return $user->account_id === $report->account_id;
    }

    public function view(User $user, Report $report): bool
    {
        return $user->account_id === $report->account_id;
    }
}
