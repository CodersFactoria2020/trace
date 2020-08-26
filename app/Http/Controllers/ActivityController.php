<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
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
        return view('activity.index', compact('activities'), compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', Activity::class);
        $activities = Activity::all();
        $categories = Category::all();
        return view('activity.create', compact('activities'), compact('categories'));
    }

    public function store(Request $request, Activity $activity)
    {
        $this->authorize('create', Activity::class);
        $data = $request->all();

        $activity = Activity::create($data);

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
        return view('activity.show', compact('activities'), compact('categories'));
    }

    public function edit(Activity $activity)
    {
        $this->authorize('update', Activity::class);
        $activities = Activity::all();
        $categories = Category::all();
        return view('activity.edit', compact('activities'), compact('categories'));
    }

    public function update(Request $request, Activity $activity)
    {
        $this->authorize('update', Activity::class);
        $activity->update($request->all());

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
