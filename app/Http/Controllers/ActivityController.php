<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\User;
use Illuminate\Http\Request;


class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view-any', Activity::class);
        $activities = Activity::paginate(10);
        $categories = Category::all();
        $users = User::all();
        $admins = User::where('role_id', 3)->get();
        $professionals = User::where('role_id', 2)->get();
        $socis = User::where('role_id', 1)->get();

        if (auth()->user()->role_id === "Soci") {
            $activities = auth()->user()->activities;
            return view('activity.index', compact('activities'));
        }

        return view('activity.index', compact('activities','categories', 'users', 'professionals', 'socis'));
    }

    public function create()
    {
        $this->authorize('create', Activity::class);
        $activities = Activity::all();
        $categories = Category::all();

        return view('activity.index', compact('activities','categories'));
    }

    public function store(Request $request, Activity $activity)
    {
        $this->authorize('create', Activity::class);
        $data = $request->all();

        $activity = Activity::create($data);
        $activity->remove_t_from_date();
        $activity->users()->sync($request->get('user'));
        $socis = $request->socis;

        if (isset($socis) == true) {
            foreach($socis as $soci){
                $user = User::where('id', $soci)->first();
                $user->activities()->attach($activity);
                }
        }

        if($file = $request->file('file'))
        {
            $activity->upload_file($file);
        }

        return redirect('/activity')->with('status_success', 'L\'activitat s\'ha creat correctament ');
    }

    public function download(Request $request, Activity $activity)
    {

        //$this->authorize('view', Activity::class);
        return $activity->download_file();
    }

    public function show(Activity $activity)
    {
        $this->authorize('view', Activity::class);
        return view('activity.show', compact('activities', 'categories'));
    }

    public function edit(Activity $activity)
    {
        $this->authorize('update', Activity::class);
        $activities = Activity::all();
        $categories = Category::all();
        return view('activity.edit', compact('activities', 'categories'));
    }

    public function update(Request $request, Activity $activity)
    {
        $this->authorize('update', Activity::class);
        $activity->update($request->all());
        $activity->remove_t_from_date();
        $activity->users()->sync($request->get('user'));
        $socis = $request->socis;

        foreach($socis as $soci){
            $user = User::where('id', $soci)->first();
            $user->activities()->attach($activity);
            }

        if($file = $request->file('file'))
        {
            $activity->upload_file($file);
        }

        return redirect('/activity')->with('status_succes', 'L\'activitat s\'ha actualitzat correctament ');

    }

    public function destroy(Activity $activity)
    {

        $this->authorize('destroy', Activity::class);
        $activity->delete();
        return redirect('/activity')->with('status_success','L\'activitat s\'ha esborrat correctament');
    }
    public function destroy_file(Activity $activity)
    {

        $this->authorize('destroy', Activity::class);
        $activity->delete_file();
        return redirect('/activity');
    }



}
