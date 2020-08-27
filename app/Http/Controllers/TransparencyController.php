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
        $this->authorize('view-any', Transparency::class);
        $transparencies = Transparency::paginate(10);

        if (auth()->user()->role_id != "Admin") {
            return view('user.notauthorized');
        }
        return view('transparency.index', compact('transparencies'));
    }

    public function create()
    {
        $this->authorize('create', Transparency::class);
        $transparencies = Transparency::all();
        return view('transparency.create', compact('transparencies'));

    }

    public function store(Request $request, Transparency $transparency)
    {
        $this->authorize('create', $transparency);
        $data = $request->all();

        $transparency = Transparency::create($data);
        $this->upload_documents($request, $transparency);
        return redirect(route('transparency.index'));
    }

    public function show(Transparency $transparency)
    {
        $this->authorize('view', Transparency::class);
        return view('transparency.show',compact('transparency'));
    }

    public function edit(Transparency $transparency)
    {
        $this->authorize('update', Transparency::class);
        return view('transparency.edit',compact('transparency'));
    }

    public function update(Request $request, Transparency $transparency)
    {
        $this->authorize('update', $transparency);
        $data = $request->all();

        $transparency->update($data);

        $this->upload_documents($request, $transparency);

        return redirect('/transparency');
    }

    public function destroy(Transparency $transparency)
    {
        $this->authorize('destroy', $transparency);
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
