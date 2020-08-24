<?php

namespace App\Policies;

use App\Workplan;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class WorkplanPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function view(User $user, Workplan $workplan)
    {
        if (Auth::user()->id !== $workplan->user_id) {
            return false;
        }
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function create(User $user, Workplan $workplan)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function update(User $user, Workplan $workplan)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function destroy(User $user, Workplan $workplan)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }

    public function restore(User $user, Workplan $workplan)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }
}