<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        return view('team.index',['teams'=>$teams]);
    }

    public function create(Request $request)
    {

        return view('team.create', compact('request'));
    }

    public function store(Request $request, Team $team)
    {

        $this->validate($request, [
            'photo' => 'required|image|mimetypes:image/jpeg,image/png,image/jpg'
        ]);

        $team = Team::create([
            'fullname' => $request->fullname,
            'profession' => $request->profession,
            'photo' => $request->photo,
        ]);

        $upload = $request->file('photo');
        $photo = $upload->storeAs('/team/',$team->id.'.jpg');
        return redirect('/team/'.$team->id);
    }

    public function show(Team $team)
    {
        //
    }

    public function edit(Team $team)
    {
        return view('team.edit', ['team' => $team], compact('request'));
    }

    public function update(Request $request, Team $team)
    {
        $team->update($request->all());
        return redirect(route('team.index'));
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect(route('user.index'));
    }
}
