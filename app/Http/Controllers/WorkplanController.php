<?php

namespace App\Http\Controllers;

use App\Workplan;
use App\User;
use App\Activity;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkplanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user();
        $this->authorize('view-any', $user);
        $workplans = new Workplan;
        $roles = Role::all();
        $activities = Activity::all();
        $users = new User;
        $users_per_page = 10;
        $users = $users->where('role_id','=', '1');
        if (request()->has('sort')) {
            $users = $users->orderBy('last_name', request('sort'));
        }
        $users = $users->paginate($users_per_page)->appends([
            'role_id' => request('role_id'),
            'sort' => request('sort'),
        ]);
        return view('workplans.index', compact('users','roles', 'activities', 'workplans'));
    }

    public function create()
    {
        $user = Auth::user();
        $this->authorize('create', $workplan);
        $workplans = new Workplan;
        $users = User::all();
        $roles = Role::all();
        $activities = Activity::all();
        return view('workplans.create', compact('users','roles', 'activities', 'workplans'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->authorize('create', $workplan);
        $workplan = Workplan::create($request->all());
        $workplan->activities()->sync($request->get('activity'));
        return redirect('workplans.index')->with('status_success',"S'ha creat el pla de treball correctament");
    }

    public function show(Workplan $workplan)
    {
        $user = Auth::user();
        $this->authorize('view', $workplan);
        $workplans = Workplan::all();
        $activities = Activity::all();
        return view('workplans.show', compact('users','roles', 'activities', 'workplans'));
    }

    public function edit(Workplan $workplan)
    {
        $this->authorize('update', $workplan);
        $workplans = Workplan::all();
        $activities = Activity::all();
        return view('workplans.edit', compact('users','roles', 'activities', 'workplans'));
    }

    public function update(Request $request, Workplan $workplan)
    {
        $this->authorize('update', $workplan);
        $workplan->update($request->all());
        $workplan->activities()->sync($request->get('activity'));
        return redirect('workplans.index')->with('status_success',"S'ha actualitzat el pla de treball correctament");
    }

    public function destroy(Workplan $workplan)
    {
        $this->authorize('destroy', $workplan);
        $workplan->delete();
        return redirect('workplans.index')->with('status_success',"S'ha esborrat el pla de treball correctament");
    }
}