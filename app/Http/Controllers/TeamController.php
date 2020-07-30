<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        return view('team.index',compact('teams'));
    }

    public function create(Request $request)
    {
        $teams = Team::all();
        return view('team.create', compact('teams'));

    }

    public function store(Request $request, Team $team)
    {

        $team=$request->all();


        if ($photo = $request->file('photo')) {
            $name_photo = $photo->getClientOriginalName();
            $photo->storeAs('/team/', $name_photo);
            $team['photo'] = $name_photo;
        }


        Team::create($team);


        return redirect(route('team.index'));
    }

    public function show(Team $team)
    {
        return view('team.show',compact('team'));
    }

    public function edit(Team $team)
    {
        return view('team.edit',compact('team'));
    }

    public function update(Request $request, Team $team)
    {

        if ($photo = $request->file('photo')) {
            $name_photo = $photo->getClientOriginalName();
            $photo->move('images', $name_photo);
            $team['photo'] = $name_photo;
        }
        $team->update($request->all());
        return redirect('/team');
    }

    public function destroy(Team $team)
    {

        $team->delete();
        Storage::delete('images');
        return redirect()->route('team.index');
    }
}
