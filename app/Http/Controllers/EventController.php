<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use App\User;
use App\Activity;
use App\Role;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        $users = $users->except(['dni','phone','tutor','role_id']);
        $activities = Activity::all();
        $roles = Role::all();
        return view('events.index', compact('categories'), compact('activities'), compact('users'));
    }

    public function store(Request $request)
    {
        $eventData = request()->except(['_token', '_method']);
        Event::insert($eventData);
    }

    public function show()
    {
        $allEventsData['events'] = Event::all();
        return response()->json($allEventsData['events']);
    }
   
    public function update(Request $request, $id)
    {
        $eventData = request()->except(['_token', '_method']);
        $response = Event::where('id','=',$id)->update($eventData);
        return response()->json($response);
        
    }
    
    public function destroy($id)
    {
        $events = Event::findOrFail($id);
        Event::destroy($id);
        return response()->json($id);
    }
}