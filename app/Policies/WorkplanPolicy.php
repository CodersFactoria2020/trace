<?php

namespace App\Policies;

use App\Workplan;
use App\Activity;
use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class WorkplanPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if (Auth::user()->role_id === "Soci") {
            return false;
        }
        return true;
    }

    public function view(User $user, Workplan $workplan)
    {
        return true;
    }
        
    public function edit(User $user, Workplan $workplan)
    {
        if (auth()->user()->role_id !== "Admin") {
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

    public function forceDelete(User $user, Workplan $workplan)
    {
        if (Auth::user()->role_id !== "Admin") {
            return false;
        }
        return true;
    }
}