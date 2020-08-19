<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function view(User $user, User $model)
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

    public function update(User $user, User $model)
    {
        if ($user->role_id !== "Admin") {
            return false;
        }
        if ($user->id === $model->id) {
            return false;
            }
        return true;
    }

    public function destroy(User $user, User $model)
    {
        if ($user->role_id !== "Admin") {
            return false;
        }
        if ($user->id === $model->id) {
            return false;
            }
        return true;
    }
}