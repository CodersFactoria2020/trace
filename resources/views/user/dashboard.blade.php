@extends('layouts.dashboard-navbar')

@section('content')
    <div class="container">
        <div class="card col-12">
            <div class="card-header">
                <h1>Benvingut/da  {{Auth::User()->first_name}}</h1><hr>
                {{-- <a href="/user" class="mybtn btn btn-secondary">Gestió d'usuaris</a>
                <a href="/activity" class="mybtn btn btn-secondary">Gestió d'activitats</a> --}}
            </div>
            <div class="card-body">
                <h5>Selecciona en el panell de l'esquerra l'apartat al qual desitges accedir.</h5>
            </div>

        </div>
    </div>
@endsection
