<?php

namespace App\Policies;

use App\Transparency;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransparencyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->role_id === "Soci") {
            return false;
        }

        return true;
    }

    public function view(User $user, Transparency $transparency)
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

    public function update(User $user,Transparency $transparency)
    {
        if ($user->role_id !== "Admin") {
            return false;
        }

        return true;
    }

    public function destroy(User $user, Transparency $transparency)
    {
        if ($user->role_id !== "Admin") {
            return false;
        }

        return true;
    }
}
