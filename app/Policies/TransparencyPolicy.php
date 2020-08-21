<?php

namespace App\Policies;

use App\Transparency;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TransparencyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function view(User $user, Transparency $transparency)
    {
        return true;
    }

    public function edit(User $user, Transparency $transparency)
    {
        if (auth()->user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function create(User $user, Transparency $transparency)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function update(User $user, Transparency $transparency)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function destroy(User $user, Transparency $transparency)

    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function restore(User $user, Transparency $transparency)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function forceDelete(User $user, Transparency $transparency)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }
}
