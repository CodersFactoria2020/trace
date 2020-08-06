<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }
    
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return redirect(route('user.index'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        return view('user.show', ['user' => $user], compact('roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('user.edit', ['user' => $user], compact('roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect(route('user.index'));
    }

    public function destroy(User $user)
    {
        if ((auth()->user()->can('destroy', $user)) & (auth()->user()->id != $user->id)) {
            $user->delete();
        }
        return redirect(route('user.index'));
    }
}