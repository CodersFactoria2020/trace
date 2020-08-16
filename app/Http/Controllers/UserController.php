<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\Role;
use App\Http\Resources\Role as RoleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // public $users_per_page;
    
    public function __construct()
    {
        $this->middleware('auth');
        // this->users_per_page = $users_per_page;
    }

    public function index()
    {
        // $users = User::paginate($this->users_per_page);
        $users = User::paginate(6);
        $roles = Role::all();
        if (auth()->user()->role_id === "Soci") {
            return view('user.notauthorized');
        }
        if (request()->has('role_id')) {
            $users = User::where('role_id', request('role_id'))
            ->paginate(5)
            ->appends('role_id', request('role_id'));
            return view('user.index', ['users' => $users], compact('roles'));
        }
        return view('user.index', ['users' => $users], compact('roles'));
    }

    public function create()
    {
        $roles = Role::all();
        if (auth()->user()->can('create', $user)) {
            return view('user.create', compact('roles'));
        }
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
        if (auth()->user()->can('edit', $user)) {
            return view('user.edit', ['user' => $user], compact('roles'));
        }
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
        
    public function dashboard()
    {
        $users = User::all();
        $roles = Role::all();
        if (auth()->user()->role_id != "Soci") {
            return view('user.dashboard', ['users' => $users], compact('roles'));
        }
        return view('user.soci');
    }
        
    public function workplans()
    {
        $users = User::all();
        $roles = Role::all();
        $activities = Activity::all();
        if (auth()->user()->role_id != "Soci") {
            return view('workplans.index', ['users' => $users], compact('roles'), compact('activities'));
        }
        return view('workplans.soci');
    }
        
    public function team()
    {
        $users = User::all();
        $roles = Role::all();
        if (auth()->user()->role_id != "Admin") {
            return view('user.notauthorized');
        }
        return view('team.index');
    }
}