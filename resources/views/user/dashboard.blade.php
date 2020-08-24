@extends('layouts.app-dashboard')

@section('content')
<div class="col">
    <div class="dashboard-right-side">
        <div class="full-vertical-align">
            <div class="float-right">
                <h2>Benvingut/da  {{Auth::User()->first_name}}</h2>
                <h5>Selecciona en el panell de l'esquerra l'apartat al qual desitges accedir.</h5>
            </div>   
        </div>
    </div>
</div>

@endsection
