@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1> Membre de l'equip</h1><hr>
            </div>
            <div class="card-body">
                <div class="flex-container">
                    <div class="member">
                        <img src="images/{{$team->photo}}" alt="" />
                        <h4>{{$team->first_name}} {{$team->last_name}}</h4>
                        <span>{{$team->position}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{Route('team.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
