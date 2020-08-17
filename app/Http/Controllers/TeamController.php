<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use App\Role;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{

    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $teams = Team::all();
        if (auth()->user()->role_id != "Admin") {
            return view('user.notauthorized');
        }
        return view('team.index', compact('teams'));
    }

    public function create(Request $request)
    {
        $teams = Team::all();
        return view('team.create', compact('teams'));

    }

    public function store(Request $request, Team $team)
    {
        $data = $request->all();
        $team = Team::create($data);

        if ($photo = $request->file('photo')) {
           $team->upload_photo($photo);
        }

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
        $team->update($request->all());

        if ($photo = $request->file('photo')) {
            $team->upload_photo($photo);
        }

        return redirect('/team');
    }

    public function destroy(Team $team)
    {

        $team->delete();
        Storage::delete('images');
        return redirect()->route('team.index');
    }
}