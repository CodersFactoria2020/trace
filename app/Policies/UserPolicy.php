<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /*public function viewAny(User $user)
    {
        //
    }
    public function view(User $user, User $model)
    {
        //
    }
    public function create(User $user)
    {
        //
    }*/

    public function update(User $user, User $model, $permissionRequired=null)
    {
        $adminPermission = $permissionRequired[0];
        $ownPermission = $permissionRequired[1];

        if ($user->havePermission($adminPermission))
        {
            return true;
        }
        if ($user->havePermission($ownPermission))
        {
            if ($user->id === $model->id)
            {
                return true;
            }
        }
        return false;
    }

    public function delete(User $user, User $model, $permissionRequired=null)
    {
        $adminPermission = $permissionRequired[0];
        $ownPermission = $permissionRequired[1];

        if ($user->havePermission($adminPermission))
        {
            return true;
        }
        if ($user->havePermission($ownPermission))
        {
            if ($user->id === $model->id)
            {
                return true;
            }
        }
        return false;
    }
}
