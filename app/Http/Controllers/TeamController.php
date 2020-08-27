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
        $teams = Team::paginate(10);
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
        $this->authorize('create', $team);
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
        $this->authorize('update', $team);
        $team->update($request->all());
      
        if ($photo = $request->file('photo')) {
            $team->upload_photo($photo);
        }
        return redirect('/team')->with('status_success', 'El membre s\'ha actualitzat correctament ');
    }

    public function destroy(Team $team)
    {
        $this->authorize('destroy', $team);
        $team->delete();
        Storage::disk('public')->delete('team/*.jpg');
        return redirect()->route('team.index')->with('status_success','El membre s\'ha esborrat correctament');
    }

    public function viewVisitor(Team $team){
        $teams = Team::all();
        return view('/equip', compact('teams'));
    }
}
