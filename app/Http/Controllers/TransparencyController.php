<?php

namespace App\Http\Controllers;

use App\Transparency;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class TransparencyController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $transparencies = Transparency::all();
        if (auth()->user()->role_id != "Admin") {
            return view('user.notauthorized');
        }
        return view('transparency.index', compact('transparencies'));
    }

    public function create()
    {
        $transparencies = Transparency::all();
        return view('transparency.create', compact('transparencies'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $transparency = Transparency::create($data);
        if ($document = $request->file('document')) {
            $transparency->upload_document($document);
        }

        return redirect(route('transparency.index'));
    }

    public function show(Transparency $transparency)
    {
        return view('transparency.show',compact('transparency'));
    }

    public function edit(Transparency $transparency)
    {
        return view('transparency.edit',compact('transparency'));
    }

    public function update(Request $request, Transparency $transparency)
    {
        $transparency->update($request->all());

        if ($document = $request->file('document')) {
            $transparency->upload_document($document);
        }

        return redirect('/transparency');
    }

    public function destroy(Transparency $transparency)
    {
        $transparency->delete();
        Storage::delete('document');
        return redirect()->route('transparency.index');
    }
}
