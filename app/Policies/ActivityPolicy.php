<?php

namespace App\Policies;

use App\Activity;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->role_id === "Soci") {
            return false;
        }

        return true;
    }

    public function view(User $user, Activity $activity)
    {
        return true;
    }

    public function create(User $user)
    {
        if ($user->role_id === "Soci") {
            return false;
        }

        return true;
    }

    public function update(User $user)
    {
        if ($user->role_id === "Soci") {
            return false;
        }

        return true;
    }

    public function destroy(User $user)
    {
        if ($user->role_id === "Soci") {
            return false;
        }
        
        return true;
    }
}
