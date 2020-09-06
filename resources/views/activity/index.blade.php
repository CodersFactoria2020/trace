@extends('layouts.app-dashboard')

@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

@endsection

@section('content')

<div class="col">
    @include('custom.message')
    <div class="dashboard-right-side">
        <div class="float-left">
            <h2>Activitats</h2>
        </div>

        <button type="button" class="cta" data-toggle="modal" data-target="#create-activity"> Afegir una activitat</button>
        @include('activity.create')
    </div>
    <div class="dashboard-right-side">
        <table class="table table-striped table-borderless">
            <thead class="thead text-uppercase">
                <tr>
                    <td><small><b>Títol</b></small></td>
                    <td><small><b>Descripció</b></small></td>
                    <td><small><b>Professional</b></small></td>
                    <td colspan="3"><small><b>Accions<small><b></td>
                </tr>
            </thead>
            @if ($activities)
                @foreach($activities as $activity)
                    @can('view-any', $activity)
                        <tr>
                            <td class="icon-text">
                                <div class="primary-green">
                                    <a href="" data-toggle="modal" data-target="#show-activity{{$activity->id}}" class="primary-green" activity="button">
                                        @isset ($activity->category_id)
                                        <i class="fa fa-circle" style="font-size:20px;color:{{$activity->getCategoryColor()}}"></i>
                                        @endisset
                                        {{$activity->title}}
                                    </a>
                                </div>
                                @include('activity.show')
                            </td>
                            <td>{{Str::limit($activity->description, 40)}}</td>
                            <td>
                                @foreach ($activity->users as $user)
                                    @if ($user->role_id != 'Soci')
                                        <p>{{$user->first_name}} {{$user->last_name}}</p>
                                    @endif
                                @endforeach
                            <td>
                            <td class="actions">
                                @can('update', $activity)
                                    <div class="primary-green">
                                        <a href=""  data-toggle="modal" data-target="#edit-activity{{$activity->id}}" class="primary-green" activity="button">
                                            <i class="icofont-ui-edit"></i>
                                        </a>
                                    </div>
                                @include('activity.edit')
                                @endcan
                            </td>

                            <td class="actions">
                                @can('destroy', $activity)
                                    <div class="danger">
                                        <a href=""  data-toggle="modal" data-target="#destroy-activity{{$activity->id}}" class="danger" activity="button">
                                            <i class="icofont-ui-delete"></i>
                                        </a>
                                    </div>
                                    @include('activity.destroy')
                                @endcan
                            </td>
                        </tr>
                    @endcan
                @endforeach
            @endif
        </table>
    </div>
    <div class="dashboard-right-side d-flex align-items-center justify-content-end">
        <div class=""><small>Mostrant {{ count($activities) }} de {{ $activities->total() }}</small></div>
        <div class=""> {{ $activities->links() }}</div>
    </div>
</div>
@endsection
