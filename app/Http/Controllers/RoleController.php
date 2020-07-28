<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles=role::all();
        return view('role.index', ['roles'=>$roles]);
    }

    public function create()
    {
        $permissions=Permission::all();
        return view('role.create',['permissions'=>$permissions]);
    }

    public function store(Request $request)
    {
        $role=Role::create($request->all());
        $role->permissions()->sync($request->get('permission'));
        return redirect(route('role.index'));
    }

    public function show(role $role)
    {
        return view('role.show', ['role'=>$role]);
    }

    public function edit(role $role)
    {
        $permissions=Permission::all();
        return view('role.edit',['role'=>$role, 'permissions'=>$permissions]);
    }

    public function update(Request $request, role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->get('permission'));
        return redirect(route('role.index'));
    }

    public function destroy(role $role)
    {
        $role->delete();
        return redirect (route('role.index'));
    }
}
