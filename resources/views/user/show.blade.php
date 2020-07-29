@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>user {{$user->name}}</h1><hr>
            </div>
            <h2>ID:</h2><p>{{$user->id}}</p>
            <h2>Name:</h2><p>{{$user->first_name}}</p>
            <h2>Last Name:</h2><p>{{$user->last_name}}</p>
            <h2>Email:</h2><p>{{$user->email}}</p>
            <h2>Phone:</h2><p>{{$user->phone}}</p>
            <h2>DNI:</h2><p>{{$user->dni}}</p>
            <h2>Tutor:</h2><p>{{$user->tutor}}</p>
            <h2>Rol:</h2><p>{{implode (",", $user->actualRoles())}}</p>
        </div>
        <div class="card-footer">
            <a href="{{Route('user.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
