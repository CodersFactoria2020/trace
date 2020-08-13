<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return view('eventos.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $eventData = request()->except(['_token', '_method']);
        Evento::insert($eventData);
        print_r($eventData);
        //return redirect(route('eventos.index'));
    }

    public function show()
    {
        $allEventsData['eventos'] = Evento::all();
        return response()->json($allEventsData['eventos']);
    }
    
    public function edit($id)
    {
        //
    }
   
    public function update(Request $request, $id)
    {
        $eventData = request()->except(['_token', '_method']);
        $response = Evento::where('id','=',$id)->update($eventData);
        return response()->json($response);
        //return redirect(route('eventos.index'));
        
    }
    
    public function destroy($id)
    {
        $eventos = Evento::findOrFail($id);
        Evento::destroy($id);
        return response()->json($id);
    }
}