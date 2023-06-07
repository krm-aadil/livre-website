<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function accessUserDashboard(User $user)
{
    return $user->role === 'user';
}
}
