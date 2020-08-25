<?php

namespace App\Http\Controllers;

use App\Workplan;
use App\User;
use App\Activity;
use App\Category;
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
        $users = new User;
        $roles = Role::all();
        $activities = Activity::all();
        $categories = Category::all();
        $users_per_page = 10;
        $users = $users->where('role_id','=', '1');
        if (request()->has('sort')) {
            $users = $users->orderBy('last_name', request('sort'));
        }
        $users = $users->paginate($users_per_page)->appends([
            'role_id' => request('role_id'),
            'sort' => request('sort'),
        ]);
        return view('workplans.index', compact('users','roles', 'activities', 'categories', 'workplans'));
    }

    public function create()
    {
        if (auth()->user()->role_id === "Soci") {
            return view('user.notauthorized');
        }
        $user = Auth::user();
        $this->authorize('create', $user);
        $workplans = new Workplan;
        $users = User::all();
        $roles = Role::all();
        $activities = Activity::all();
        $categories = Category::all();
        return view('workplans.create', compact('users', 'activities', 'categories', 'roles', 'workplans'));
    }

    public function store(Request $request)
    {
        $workplan = Workplan::create($request->all());
        return redirect('/workplans')->with('status_success',"S'ha creat el pla de treball correctament");
    }

    public function show(Workplan $workplan)
    {
        $workplans = Workplan::all();
        return view('user.show', compact('users','roles', 'activities', 'categories', 'workplans'));
    }

    public function edit(Workplan $workplan)
    {
        $workplans = Role::all();
        if (auth()->user()->can('edit', $workplan)) {
            return view('workplan.edit', compact('users','roles', 'activities', 'categories', 'workplans'));
        }
    }

    public function update(Request $request, Workplan $workplan)
    {
        $workplan->update($request->all());
        return redirect('/workplans')->with('status_success',"S'ha actualitzat el pla de treball correctament");
    }

    public function destroy(Workplan $workplan)
    {
        if (auth()->user()->can('destroy', $workplan)) {
            $workplan->delete();
        }
        return redirect('/workplans')->with('status_success',"S'ha esborrat el pla de treball correctament");
    }

    public function removesDuplicatedUserIdInWorkplanIndex()
    {
        $user = Auth::user();
        $this->authorize('view-any', $user);
        $workplans = Workplan::all();
        $users = User::all();
        $users_id = [];
        foreach ($workplans as $workplan) {
            if (!in_array($workplan->user_id, $users_id)) {
            array_push($users_id, $workplan->user_id);
            }
        }        
        return $users_id;
    }
}