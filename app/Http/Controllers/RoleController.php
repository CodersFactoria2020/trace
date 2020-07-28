<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('haveaccess','role.index');
        $roles=role::all();
        return view('role.index',compact('roles'));
    }

    public function create()
    {
        Gate::authorize('haveaccess','role.create');
        $permissions=Permission::Get();
        return view('role.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('haveaccess','role.create');
        $role = role::create($request->all());
        $role->permissions()->sync($request->get('permission'));
        return redirect(route('role.index'));
    }

    public function show(role $role)
    {
        Gate::authorize('haveaccess','role.show');
        $permission_role=[];
        foreach($role->permissions as $permission){
            $permission_role[]=$permission->id;
        }
        $permissions = Permission::get();
        return view('role.show', compact('role'));
    }

    public function edit(role $role)
    {
        Gate::authorize('haveaccess','role.edit');
        $permission_role=[];

        foreach($role->permissions as $permission){
            $permission_role[]=$permission->id;
        }
        $permissions=Permission::get();
        return view('role.edit', compact('permissions','role', 'permission_role'));
    }

    public function update(Request $request, role $role)
    {
        Gate::authorize('haveaccess','role.edit');
        $role->update($request->all());
        $role->permissions()->sync($request->get('permission'));
        return redirect()->route('role.index');
    }

    public function destroy(role $role)
    {
        Gate::authorize('haveaccess','role.destroy');
        $role->delete();
        return redirect (route('role.index'));
    }
}
