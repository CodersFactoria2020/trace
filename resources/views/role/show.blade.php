@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Role {{$role->name}}</h1><hr>
            </div>
            <h2>ID:</h2><p>{{$role->id}}</p>
            <h2>Name:</h2><p>{{$role->name}}</p>
            <h2>Description:</h2><p>{{$role->description}}</p>
        </div>
        <div class="card-footer">
            <a href="{{Route('role.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
