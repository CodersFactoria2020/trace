<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\gate;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('haveaccess', 'role.index');
        $roles=role::all();
        return view('role.index', ['roles'=>$roles]);
    }

    public function create()
    {
        Gate::authorize('haveaccess', 'role.create');
        $permissions=Permission::all();
        return view('role.create',['permissions'=>$permissions]);
    }

    public function store(Request $request)
    {
        Gate::authorize('haveaccess', 'role.create');
        $role=Role::create($request->all());
        $role->permissions()->sync($request->get('permission'));
        return redirect(route('role.index'));
    }

    public function show(role $role)
    {
        Gate::authorize('haveaccess', 'role.show');
        return view('role.show', ['role'=>$role]);
    }

    public function edit(role $role)
    {
        Gate::authorize('haveaccess', 'role.edit');
        $permissions=Permission::all();
        return view('role.edit',['role'=>$role, 'permissions'=>$permissions]);
    }

    public function update(Request $request, role $role)
    {
        Gate::authorize('haveaccess', 'role.edit');
        $role->update($request->all());
        $role->permissions()->sync($request->get('permission'));
        return redirect(route('role.index'));
    }

    public function destroy(role $role)
    {
        Gate::authorize('haveaccess', 'role.destroy');
        $role->delete();
        return redirect (route('role.index'));
    }
}
