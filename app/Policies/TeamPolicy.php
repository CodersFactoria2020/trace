<?php

namespace App\Policies;

use App\Team;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TeamPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function view(User $user, Activity $activity)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;return true;
    }
        
    public function edit(User $user, Activity $activity)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function create(User $user, Activity $activity)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function update(User $user, Activity $activity)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function destroy(User $user, Activity $activity)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function restore(User $user, Activity $activity)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function forceDelete(User $user, Activity $activity)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }
}