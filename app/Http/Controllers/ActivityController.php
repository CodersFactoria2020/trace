<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view-any', Activity::class);
        $activities = Activity::all();
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
        $this->validate($request, [
            'file' => 'file|max:9920000'
        ]);

        $activity = Activity::create([
            'title' => $request->title,
            'description' => $request->description,
            'professional1' => $request->professional1,
            'file' => $request->file,
            'date'=> $request->date,
            'time'=> $request->time,
        ]);

        if($activity['file']) {
            $upload = $request->file('file');
            $document = $upload->storeAs('/activities/', $activity->id. '.pdf', ['disk'=>'public']);
        }
        return redirect('/activity')->with('status_succes', 'L\'activitat s\'ha creat correctament ');
    }

    public function download(Request $request, Activity $activity)
    {
        $this->authorize('view', Activity::class);
        return Storage::download('/activities/'.$activity->id.'.pdf', $activity->title.'.pdf');
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
        return redirect('/activity')->with('status_succes', 'L\'activitat s\'ha actualitzat correctament ');
    }

    public function destroy(Activity $activity)
    {
        $this->authorize('destroy', Activity::class);
        $activity->delete();
        return redirect('/activity')->with('status_succes','L\'activitat s\'ha esborrat correctament');
    }
}
