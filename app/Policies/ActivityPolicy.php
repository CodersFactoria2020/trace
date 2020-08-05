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
        return true;
    }

    public function view(User $user, Activity $activity)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Activity $activity)
    {
        //
    }

    public function delete(User $user, Activity $activity)
    {
        //
    }

    public function restore(User $user, Activity $activity)
    {
        //
    }

    public function forceDelete(User $user, Activity $activity)
    {
        //
    }
}