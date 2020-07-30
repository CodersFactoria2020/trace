<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ActivityController extends Controller
{

    public function index()
    {
        $activities = Activity::all();
        return view('activity.index', compact('activities'));
    }

    public function create()
    {
        return view('activity.create');
    }

    public function store(Request $request, Activity $activity)
    {

        $this->validate($request, [
            'file' => 'file|max:9920000'
        ]);

        $activity = Activity::create([
            'name' => $request->name,
            'description' => $request->description,
            'professional' => $request->professional,
            'file' => $request->file,
            'date'=> $request->date,
            'time'=> $request->time,
            'activity_id' => $request->activity_id,
        ]);

        if($activity['file']) {
            $name = $activity->getClientOriginalName();
            $upload = $request->file('file');
            $document = $upload->storeAs('/activities/', $name . '.pdf');
        }
        return redirect('/activity');
    }
    public function download(Request $request, Activity $activity)
    {
        return Storage::download('/activities/'.$activity->id.'.pdf', $activity->name.'.pdf');
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
