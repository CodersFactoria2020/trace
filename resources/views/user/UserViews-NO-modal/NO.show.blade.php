@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>DETALLS DE L'USUARI: {{$user->first_name}} {{$user->last_name}}</h2>                
            </div>
            <div class="card-body">
                <h4>ID: {{$user->id}}</h4>
                <h4>Email: {{$user->email}}</h4>
                <h4>Telèfon: {{$user->phone}}</h4>
                <h4>DNI: {{$user->dni}}</h4>
                <h4>Tutor: {{$user->tutor}}</p>
                <h4>Rol: {{implode (",", $user->actualRoles())}}</h4>
            </div>
        <div class="card-footer">
            <a href="{{Route('user.index')}}" class="btn btn-secondary">Tancar</a>
        </div>
    </div>
@endsection
