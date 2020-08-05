<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $activities = Activity::all();
        return view('activity.index', compact('activities'));
    }

    public function create()
    {
        return view('activity.create');
    }

    public function store(Request $request)
    {
        Activity::create($request->all());
        return redirect('/activity');
    }

    public function show(Activity $activity)
    {
        //
    }

    public function edit(Activity $activity)
    {
        return view('activity.edit', compact('activity'));
    }
    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());
        return redirect('/activity');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect('/activity');
    }
}