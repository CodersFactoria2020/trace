@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Gestió de la base de dades de TraCE</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Benvingut/da {{Auth::User()->first_name}}</h1>
                    <div>
                        <a href="{{Route('user.index')}}" class="btn btn-secondary">Usuaris</a>
                        <a href="{{Route('role.index')}}" class="btn btn-secondary">Roles</a>
                        <a href="{{Route('activity.index')}}" class="btn btn-secondary">Activitats programades</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
