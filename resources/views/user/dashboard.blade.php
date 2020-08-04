@extends('layouts.dashboard-navbar')

@section('content')
    <div class="container">
        <div class="card col-12">
            <div class="card-header">
                <h1>Benvingut/da </h1><hr>
                <a href="{{Route('user.index')}}" class="mybtn btn btn-secondary">Gestió d'usuaris</a>
                <a href="{{Route('activity.index')}}" class="mybtn btn btn-secondary">Gestió d'activitats</a>
            </div>

        </div>
    </div>
@endsection
