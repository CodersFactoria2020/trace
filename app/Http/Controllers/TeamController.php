<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{

    public function index()
    {
        $this->authorize('view-any', Team::class);
        $teams = Team::paginate(8);
        return view('team.index', compact('teams'));
    }

    public function create(Request $request)
    {
        $this->authorize('create', Team::class);
        $teams = Team::all();
        return view('team.create', compact('teams'));

    }

    public function store(Request $request, Team $team)
    {
        $this->authorize('create', Team::class);
        $data = $request->all();
        $team = Team::create($data);

        if ($photo = $request->file('photo')) {
           $team->upload_photo($photo);
        }

        return redirect(route('team.index'))->with('status_success', 'El membre s\'ha creat correctament ');
    }

    public function show(Team $team)
    {
        $this->authorize('view', Team::class);
        return view('team.show',compact('team'));
    }

    public function edit(Team $team)
    {
        $this->authorize('update', Team::class);
        return view('team.edit',compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $this->authorize('update', Team::class);
        $team->update($request->all());

        if ($photo = $request->file('photo')) {
            $team->upload_photo($photo);
        }

        return redirect('/team')->with('status_success', 'El membre s\'ha actualitzat correctament ');
    }

    public function destroy(Team $team)
    {
        $this->authorize('destroy', Team::class);
        $team->delete();
        Storage::delete('images');
        return redirect()->route('team.index')->with('status_success','El membre s\'ha esborrat correctament');
    }
}
