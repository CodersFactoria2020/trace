<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\Role;
use App\Team;
use App\Http\Resources\Role as RoleResource;
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
        $user = Auth::user();
        $this->authorize('view-any', $user);
        $users = new User;
        $roles = Role::all();
        $users_per_page = 8;
        if (request()->has('role_id')) {
            $users = $users->where('role_id', request('role_id'));
        }
        if (request()->has('sort')) {
            $users = $users->orderBy('last_name', request('sort'));
        }
        $users = $users->paginate($users_per_page)->appends([
            'role_id' => request('role_id'),
            'sort' => request('sort'),
        ]);
        return view('user.index', ['users' => $users], compact('roles'));
    }

    public function create()
    {
        $this->authorize('create', $user);
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->authorize('create', $user);
        $user = User::create($request->all());
        return redirect('/user')->with('status_success',"S'ha creat l'usuari correctament");
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        $roles = Role::all();
        return view('user.show', ['user' => $user], compact('roles'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::all();
        return view('user.edit', ['user' => $user], compact('roles'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $user->update($request->all());
        return redirect('/user')->with('status_success',"S'ha actualitzat l'usuari correctament");
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        return redirect('/user')->with('status_success',"S'ha esborrat l'usuari correctament");
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
        
    // public function team()
    // {
    //     $users = User::all();
    //     $roles = Role::all();
    //     $teams = Team::all();
    //     if (auth()->user()->role_id != "Admin") {
    //         return view('user.notauthorized');
    //     }
    //     return view('team.index', compact('teams'));
    // }
}