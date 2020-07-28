<?php

namespace App\Http\Controllers;

use App\Role;
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
        return view('role.create');
    }

    public function store(Request $request)
    {
        role::create($request->all());
        return redirect(route('role.index'));
    }

    public function show(role $role)
    {
        return view('role.show', ['role'=>$role]);
    }

    public function edit(role $role)
    {
        return view('role.edit',['role'=>$role]);
    }

    public function update(Request $request, role $role)
    {
        $role->update($request->all());
        return redirect(route('role.index'));
    }

    public function destroy(role $role)
    {
        $role->delete();
        return redirect (route('role.index'));
    }
}
