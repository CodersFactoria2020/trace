@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Activitats</h1>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-activity">
                    Afegir nova activitat
                </button>
                <a href="{{Route('dashboard')}}" class="mybtn btn btn-secondary">Panel de control</a>
                
                @foreach($activities as $activity)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$activity->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$activity->description}}</h6>
                            <p class="card-text">
                                    {{$activity->professional}}
                                    {{$activity->date}}
                                    {{$activity->time}}
                            </p>

                        <a class="btn btn-secondary" data-toggle="modal" data-target="#edit-activity{{$activity->id}}">
                            Editar
                            <i class="fas fa-plus"></i>
                        </a>
                        @include('activity.edit')
                        
                           

                            <form action="{{route('activity.destroy', $activity->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input
                                    type="submit"
                                    value="Delete"
                                    class="btn btn-danger"
                                >
                            </form>

                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@include('activity.create')


