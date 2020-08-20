<?php

namespace App\Policies;

use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function view(User $user, Category $category)
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
        if ($user->role_id != "Admin") {
            return false;
        }
        return true;
    }

    public function destroy(User $user)
    {
        if ($user->role_id != "Admin") {
            return false;
        }
        return true;
    }
}
