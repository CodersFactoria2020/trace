@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='card'>
        <div class='card-body'>
            Equip <a href="{{Route('team.create')}}" class='btn btn-secuandary'>Nou Membre</a>
        </div>
            <ul>
                @foreach($teams as $team)
                    <li>
                        {{$team->fullname}}
                    </li>
                    <li>
                        {{$team->profession}}
                    </li>
                    <li>
                        {{$team->photo}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
