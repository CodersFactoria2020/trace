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
        $users = User::all();
        $roles = Role::all();
        $activities = Activity::all();
        if (auth()->user()->role_id != "Soci") {
            return view('weekplans.index', ['users' => $users], compact('roles'), compact('activities'));
        }
        return view('weekplans.soci');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Workplan $workplan)
    {
        //
    }

    public function edit(Workplan $workplan)
    {
        //
    }

    public function update(Request $request, Workplan $workplan)
    {
        //
    }

    public function destroy(Workplan $workplan)
    {
        //
    }
}