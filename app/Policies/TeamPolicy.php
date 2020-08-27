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
        if ($user->role_id === "Soci") {
            return false;
        }
        return true;
    }
    

    public function view(User $user, Team $team)
    {
        return true;
    }

    public function create(User $user)
    {
        if ($user->role_id != "Admin") {
            return false;
        }
        return true;
    }

    public function update(User $user)
    {
        if ($user->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function destroy(User $user)
    {
        if ($user->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function viewVisitor(User $user)
    {
        return true;
    }
}
