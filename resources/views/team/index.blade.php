@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Membres de l'equip.</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('team.create') }}"> Nou membre</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nom i Cognom</th>
            <th>Professio</th>
            <th>Foto</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($teams as $team)
            <tr>
                <td>{{$team->first_name}}, {{$team->last_name}}</td>
                <td>{{ $team->position }}</td>
                <td>{{ $team->photo }}</td>
                <td>
                    <form action="{{ route('team.destroy',$team->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('team.show',$team->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('team.edit',$team->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
