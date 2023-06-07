<?php

namespace App\Policies;

use App\Models\User;

class CRMPolicy
{
    /**
     * Create a new policy instance.
     */
    public function accessCRMDashboard(User $user)
{
    return $user->role === 'crm';
}
}
