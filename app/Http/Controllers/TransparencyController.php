<?php

namespace App\Http\Controllers;

use App\Transparency;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransparencyController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    public function index()
    {
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
        $validacion = $request->validate($data->all(), [
            'economic_document'=> 'max:2560',
            'entity_document'=> 'max:2560',
        ]);
        $transparency = Transparency::create($data,$validacion);
        if ($economic_document = $request->file('economic_document')) {
            $transparency->upload_document($economic_document);
        }
        if ($entity_document = $request->file('entity_document')) {
            $transparency->upload_document($entity_document);
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

        if ($economic_document = $request->file('economic_document')) {
            $transparency->upload_document($economic_document);
        }
        if ($entity_document = $request->file('entity_document')) {
            $transparency->upload_document($entity_document);
        }

        return redirect('/transparency');
    }

    public function destroy(Transparency $transparency)
    {
        $transparency->delete();
        Storage::delete(['entity_document', 'economic_document']);
        return redirect()->route('transparency.index');
    }
}
