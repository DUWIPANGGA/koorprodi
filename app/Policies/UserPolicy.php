<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function updateBasicInfo(User $user, User $model)
    {
        // Hanya admin/super_admin yang bisa edit info dasar
        return $user->role === 'admin' || $user->role === 'super_admin';
    }
}