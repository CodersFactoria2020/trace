<?php

namespace App\Policies;

use App\Activity;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ActivityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function view(User $user, Activity $activity)
    {
        return true;
    }

    public function create(User $user, Activity $activity)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function update(User $user, Activity $activity)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function destroy(User $user, Activity $activity)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function restore(User $user, Activity $activity)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function forceDelete(User $user, Activity $activity)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }
}