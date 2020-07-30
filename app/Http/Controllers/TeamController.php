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

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'position' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($files = $request->file('photo')) {
            $team['photo'] = $request->file('photo')->store('images', 'public');
        }

        $insert['first_name'] = $request->get('first_name');
        $insert['last_name'] = $request->get('last_name');
        $insert['position'] = $request->get('position');

        Team::create($request->all());

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

    }

    public function destroy(Team $team)
    {

        $team->delete();
        return redirect()->route('team.index');
    }
}
