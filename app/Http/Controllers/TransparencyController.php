<?php

namespace App\Http\Controllers;

use App\Transparency;
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
        $transparencies = Transparency::paginate(8);
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
        $validatedData = $request->validate([
            'economic_document'=> 'max:22560',
            'entity_document'=> 'max:22560',
        ]);
        $transparency = Transparency::create($data,$validatedData);
        $this->upload_documents($request, $transparency);

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
        $data = $request->all();
        $validatedData = $request->validate([
            'economic_document'=> 'max:22560',
            'entity_document'=> 'max:22560',
        ]);
        $transparency->update($data,$validatedData);

        $this->upload_documents($request, $transparency);
        return redirect('/transparency');
    }

    public function destroy(Transparency $transparency)
    {
        $transparency->delete();
        Storage::delete(['entity_document', 'economic_document']);
        return redirect()->route('transparency.index');
    }

    private function upload_documents(Request $request, Transparency $transparency): void
    {
        if ($request->file('economic_document')) {

            $transparency->upload_economic_document($request->file('economic_document'));
        }
        if ($request->file('entity_document')) {

            $transparency->upload_entity_document($request->file('entity_document'));
        }
    }
}
