<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
        $users_per_page = 500;

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

        return view('user.index', compact('users', 'roles'));
    }

    public function create()
    {
        $user = Auth::user();
        $this->authorize('create', $user);
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->authorize('create', $user);
        $shown_password = $request->password;
        $request->password = bcrypt(request('password'));
        $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->shown_password = $shown_password;
            $user->phone = $request->phone;
            $user->dni = $request->dni;
            $user->tutor = $request->tutor;
            $user->role_id = $request->role_id;
            $user->save();

        return redirect('/user')->with('status_success',"S'ha creat l'usuari correctament");
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        $loggedUser = Auth::user();

        if ($loggedUser->role_id === "Soci" && $user->role_id === "Soci"){
            return redirect('/dashboard');
        }

        $roles = Role::all();

        return view('user.show', compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $request->password = bcrypt(request('password'));
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone = $request->phone;
            $user->dni = $request->dni;
            $user->tutor = $request->tutor;
            $user->role_id = $request->role_id;
            $user->save();

        return redirect('/user')->with('status_success',"S'ha actualitzat l'usuari correctament");
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();

        return redirect('/user')->with('status_success',"S'ha esborrat l'usuari correctament");
    }

    public function filter(Request $request)
    {
        $user = Auth::user();
        $this->authorize('view-any', $user);
        $users = User::filterByRole($request->role_id);
        $roles = Role::all();

        return view('user.index', compact('users', 'roles'));
    }

    public function dashboard()
    {
        $user = Auth::user();
        $activities = $user->activities;
        $users = User::all();
        $roles = Role::all();

        if (auth()->user()->role_id != "Soci") {
            return view('user.dashboard', compact('users', 'roles'));
        }
        $activities = Activity::filter_todays_activities_at_any_day_of_year($activities);
        $activities = Activity::replace_start_date_with_weekday_name($activities);

        return view('user.soci', compact('activities'));
    }

    public function soci_all_activities()
    {
        $user = Auth::user();
        $activities = $user->activities;
        $monday_activities = Activity::filter_activities_by_day($activities, 1);
        $tuesday_activities = Activity::filter_activities_by_day($activities, 2);
        $wednesday_activities = Activity::filter_activities_by_day($activities, 3);
        $thursday_activities = Activity::filter_activities_by_day($activities, 4);
        $friday_activities = Activity::filter_activities_by_day($activities, 5);
        $saturday_activities = Activity::filter_activities_by_day($activities, 6);
        $sunday_activities = Activity::filter_activities_by_day($activities, 0);
        
        return view('user.soci-all-activities', compact('monday_activities', 'tuesday_activities', 'wednesday_activities', 'thursday_activities', 'friday_activities', 'saturday_activities', 'sunday_activities',));
    }

}
