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
        </div>
        <div class="card-footer">
            <a href="{{Route(‘NOMBRE.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection

