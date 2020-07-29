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

    public function create(User $user)
    {
        //
    }*/
    
    public function view(User $user, User $model)
    {
        if ($user->id === $model->id OR $user->roles[0]->name === 'admin')
        {
            return true;
        }
        return false;
    }

    public function update(User $user, User $model)
    {
        if ($user->id === $model->id OR $user->roles[0]->name === 'admin')
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, User $model)
    {
        if ($user->id === $model->id OR $user->roles[0]->name === 'admin')
        {
            return true;
        }
        return false;
    }
}
