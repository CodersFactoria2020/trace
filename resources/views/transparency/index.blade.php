@extends('layouts.app-dashboard')

@section('scripts')

  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Bootstrap CSS --  SI SE QUITA ESTE ENLACE, EL BOTÓN PRIMARY TOMA FONDO VERDE-->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
  <!-- Font Awesome CSS -->
  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>

@endsection

@section('content')
@include('custom.message')

<div class="col">

  <div class="dashboard-right-side">
    <div class="float-left"><h2>Transparència</h2></div>
    {{-- @can('create') --}}
    <button type="button" class="cta" data-toggle="modal" data-target="#create-transparency"> Afegir documents</button>
    @include('transparency.create')
    {{-- @endcan --}}
    </div>



    <div class="dashboard-right-side">
      <table class="table table-striped table-borderless">
        <thead class="thead text-uppercase">
          <td><small><b>Any</b></small></td>
          <td><small><b>Documentació Econòmica</b></small></td>
          <td><small><b>Documentació Econòmica d'entitats</b></small></td>
          <td colspan="3"><small><b>Accions</b></small></td>
        </thead>
        @foreach($transparencies as $transparency)
        @can('view-any', $transparency)
        <tr>
          <td class="icon-text">
            <div class="primary-green">
              <a href="" data-toggle="modal" data-target="#show-transparency{{$transparency->id}}" class="primary-green" transparency="button">
                {{$transparency->date_name}}
              </a>
            </div>
            @include('transparency.show')
          </td>
          <td><a href="{{$transparency->get_economic_url()}}">{{$transparency->get_saved_name_economic_document()}}</a></td>
          <td><a href="{{$transparency->get_entity_url()}}">{{$transparency->get_saved_name_entity_document()}}</a></td>

          <td class="actions">
              @can('update', $transparency)
              <div class="primary-green">
                <a href="" data-toggle="modal" data-target="#edit-transparency{{$transparency->id}}" class="primary-green" transparency="button">
                  <i class="icofont-ui-edit"></i>
                </a>
              </div>
              @include('transparency.edit')
              @endcan
          </td>

          <td class="actions danger">
              @can('destroy', $transparency)
              <a href="" data-toggle="modal" data-target="#destroy-transparency{{$transparency->id}}" class="danger" transparency="button">
                <i class="icofont-ui-delete"></i>
              </a>
              @include('transparency.destroy')
              @endcan
          </td>
      </tr>
      @endcan
      @endforeach

    </table>
  </div>
  <div class="dashboard-right-side d-flex align-items-center justify-content-end">
    <div><small>Mostrant {{ count($transparencies) }} de {{ $transparencies->total() }}</small></div>
    <div> {{ $transparencies->links() }}</div>
</div>
</div>

@endsection
