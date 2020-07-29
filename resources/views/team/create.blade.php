@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='card'>
            <form action="{{Route('team.store')}}" method="POST" enctype = "multipart / form-data >
            @csrf
                <div class="card-header">
                    Equip <a href="{{Route('team.create')}}" class='btn btn-secuandary'>Nou Membre</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nom i Cognom</label>
                        <input type="text" class="form-control" id="fullnameHelp" aria-describedby="fullnameHelp">
                        <small id="fullnameHelp" class="form-text text-muted">Col·locar Nom i Cognom del membre de l'equip.</small>
                    </div>
                    <div class="form-group">
                        <label for="">Càrrec en l'equip</label>
                        <input type="text" class="form-control" id="professionHelp" aria-describedby="professionHelp">
                        <small id="professionHelp" class="form-text text-muted">Col·locar el càrrec en l'equip</small>
                    </div>
                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <input id="photo" type="file" name="image">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" value="Create" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
