@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1> Membre de l'equip</h1><hr>
            </div>
            <h2>ID:</h2><p>{{$team->id}}</p>
            <h2>Name i Cognom:</h2><p>{{$team->first_name}} {{$team->last_name}}</p>
            <h2>Description:</h2><p>{{$team->position}}</p>
            <h2>Imatge:</h2><td> <img src="images/{{$team->photo}}" width="150" height="150"></td>
        </div>
        <div class="card-footer">
            <a href="{{Route('team.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
