<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Determine if the user can access the admin dashboard.
     */
    public function accessAdminDashboard(User $user)
{
    dd($user->role); // Debug statement to check the user's role
    return $user->role === 'admin';
}

}
