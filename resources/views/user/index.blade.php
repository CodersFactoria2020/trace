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
    <div class="float-left"><h2>Usuaris</h2></div>
        @if (auth()->user()->role_id === "Admin")
            <button type="button" class="cta" data-toggle="modal" data-target="#create-user"> Afegir un usuari</button>
            @include('user.create')
        @endif
    </div>
  <!-- ORDEN ASCENDENTE BY DEFAULT -->
  <div class="filter-views">
    <div class="float-left">
      <form action="{{ Route('user.filter') }}">
        <a href="{{url('/user')}}" class="btn btn-outline-dark btn-sm  {{ !request()->role_id ? 'active' : ''}}"> Veure tots</a>
        @foreach($roles as $role)
        <a type="submit" href="/user?role_id={{ $role->id }}" value="{{ $role->id }}" class="btn btn-outline-dark btn-sm {{ request()->role_id == $role->id ? 'active' : ''}}">{{ $role->name }}</a>
        @endforeach
      </form>
    </div>
    <div class="float-right d-flex align-items-center">
      <small class="pr-2">Ordenar per cognom:</small>
      <div>
        <a href="{{ route('user.index', ['role_id' => request('role_id'), 'sort' => 'asc']) }}" class="btn btn-outline-dark btn-sm {{ request()->sort == 'asc' ? 'active' : ''}}">Ascendent</a>
        <a href="{{ route('user.index', ['role_id' => request('role_id'), 'sort' => 'desc']) }}" class="btn btn-outline-dark btn-sm {{ request()->sort == 'desc' ? 'active' : ''}}">Descendent</a>
      </div>

    </div>
  </div>
  <!-- TABLA -->
  <div class="dashboard-right-side">
    <table class="table table-striped table-borderless">
      <thead class="thead text-uppercase">
          <tr>
            <td><small><b>Nom i cognom</b></small></td>
            <td><small><b>Rol</b></small></td>
            <td><small><b>E-mail</b></small></td>
            @if (auth()->user()->role_id === "Admin")
            <td colspan="2"><small><b>Accions</b></small></td>
            @endif
        </tr>
      </thead>

      @foreach($users as $user)
      @can('view-any', $user)
      <tr>
        <td class="icon-text">
          <div class="primary-green">
            <a href="" data-toggle="modal" data-target="#show-user{{$user->id}}" class="primary-green" user="button">
            <i class="icofont-user-alt-3"></i>
            {{$user->first_name}} {{$user->last_name}}
            </a>
        </div>
            @include('user.show')
        </td>
        <td>{{$user->role_id}}</td>
        <td class="icon-text">
          <div class="primary-green">
            <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
              <i class="icofont-send-mail" style="font-size:24px"></i>
              {{$user->email}}
            </a>
          </div>
        </td>
        <td class="actions">
          @can('update', $user)
          <div class="primary">
            <a  href="" data-toggle="modal" data-target="#edit-user{{$user->id}}" class="primary-green" user="button">
              <i class="icofont-ui-edit"></i>
            </a>
          </div>
          @include('user.edit')
          @endcan
        </td>
        <td class="actions">
          @can('destroy', $user)
          <div class="danger">
            <a href="" data-toggle="modal" data-target="#destroy-user{{$user->id}}" class="danger" user="button">
              <i class="icofont-ui-delete"></i>
            </a>
          </div>
          @include('user.destroy')
          @endcan
        </td>
      </tr>
      @endcan
      @endforeach
    </table>
  </div>
  <!-- PAGINADO -->
  <div class="dashboard-right-side d-flex align-items-center justify-content-end">
    <div class=""><small>Total: {{ $users->total() }} usuaris</small></div>
    <div class=""> {{ $users->links() }}</div>
  </div>
</div>

@endsection
