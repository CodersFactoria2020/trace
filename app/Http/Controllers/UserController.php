<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\gate;

class UserController extends Controller
{

    public function index()
    {
        Gate::authorize('haveaccess', 'user.index');
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        Gate::authorize('haveaccess', 'user.create');
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Gate::authorize('haveaccess', 'user.create');
        $user = User::create($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect(route('user.index'));
    }

    public function show(User $user)
    {
        Gate::authorize('haveaccess', 'user.show');
        $roles = Role::all();
        return view('user.show', ['user' => $user], compact('roles'));
    }

    public function edit(User $user)
    {
        $this->authorize('update',[$user, ['user.edit', 'user.ownedit']]);
        $roles = Role::all();
        return view('user.edit', ['user' => $user], compact('roles'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update',[$user, ['user.edit', 'user.ownedit']]);
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect(route('user.index'));
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy',[$user, ['user.destroy', 'user.owndestroy']]);
        $user->delete();
        return redirect(route('user.index'));
    }
}