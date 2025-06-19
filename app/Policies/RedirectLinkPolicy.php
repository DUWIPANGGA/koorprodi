<?php

namespace App\Policies;

use App\Models\RedirectLink;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedirectLinkPolicy
{
    use HandlesAuthorization;

    public function view(User $user, RedirectLink $redirectLink)
    {
        return $user->id === $redirectLink->user_id;
    }

    public function update(User $user, RedirectLink $redirectLink)
    {
        return $user->id === $redirectLink->user_id;
    }

    public function delete(User $user, RedirectLink $redirectLink)
    {
        return $user->id === $redirectLink->user_id;
    }
}