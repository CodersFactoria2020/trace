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
        $workplans = Workplan::all()->paginate(8);
        $users = User::all();
        $roles = Role::all();
        $activities = Activity::all();
        $categories = Category::all();
        if (auth()->user()->role_id !== "Soci") {
            return view('workplans.index', ['users' => $users], compact('roles'), compact('activities'), compact('categories'));
        }
        return view('workplans.soci');
    }

    public function create()
    {
        if (auth()->user()->role_id === "Soci") {
            return view('user.notauthorized');
        }
        return view('workplans.create', ['users' => $users], compact('activities'), compact('categories'), compact('roles'));
    }

    public function store(Request $request)
    {
        $workplan = Workplan::create($request->all());
        return redirect('/workplans')->with('status_success',"S'ha creat el pla de treball correctament");
    }

    public function show(Workplan $workplan)
    {
        $workplans = Workplan::all();
        return view('user.show', ['workplan' => $workplan]);
    }

    public function edit(Workplan $workplan)
    {
        $workplans = Role::all();
        if (auth()->user()->can('edit', $workplan)) {
            return view('workplan.edit', ['users' => $users], compact('activities'), compact('categories'), compact('roles'));
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
}