<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\User;
use App\Role;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $activities = Activity::all();
        $categories = Category::all();
        $users = User::all();
        $roles = Role::all();
        if (auth()->user()->role_id === "Soci") {
            return view('user.notauthorized');
        }
        return view('activity.index', compact('activities'), compact('categories'));
    }

    public function create()
    {
        $activities = Activity::all();
        $categories = Category::all();
        $users = User::all();
        $roles = Role::all();
        if (auth()->user()->role_id === "Soci") {
            return view('user.notauthorized');
        }
        return view('activity.create', ['users' => $users], compact('activities'), compact('categories'), compact('roles'));
    }

    public function store(Request $request, Activity $activity)
    {
        $data = $request->all();

        $activity = Activity::create($data);

        if($file = $request->file('file'))
        {
            $activity->upload_file($file);
        }

        return redirect('/activity')->with('status_succes', 'L\'activitat s\'ha creat correctament ');
    }

    public function download(Request $request, Activity $activity)
    {

        return $activity->download_file();

    }

    public function show(Activity $activity)
    {
        $roles = Role::all();
        $activities = Activity::all();
        return view('activity.show', ['users' => $users], compact('activities'), compact('categories'), compact('roles'));
    }

    public function edit(Activity $activity)
    {
        $activities = Activity::all();
        $categories = Category::all();
        $users = User::all();
        $roles = Role::all();
        if (auth()->user()->can('edit', $activity)) {
            return view('activity.edit', compact('users'), compact('activities'), compact('categories'), compact('roles'));
        }
    }

    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());
        return redirect('/activity')->with('status_succes', 'L\'activitat s\'ha actualitzat correctament ');
    }

    public function destroy(Activity $activity)
    {
        if (auth()->user()->can('destroy', $activity)) {
            $activity->delete();
        }
        return redirect('/activity')->with('status_succes','L\'activitat s\'ha esborrat correctament');
    }
}
