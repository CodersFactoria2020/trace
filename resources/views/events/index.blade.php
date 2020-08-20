@extends('layouts.app-dashboard')

@section('scripts')

  <meta name="csrf-token" content="{{ csrf_token() }}">

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

<link rel="stylesheet" href="{{ asset('fullcalendar/lib/main.css') }}">
<script src="{{ asset('fullcalendar/lib/main.js') }}" defer></script>
<script src="{{ asset('fullcalendar/lib/locales-all.js') }}" defer></script>

<script>
  var url_="{{ url('/events') }}";
  var url_show="{{ url('events/show') }}";
</script>
<script src="{{ asset('js/maincalendar.js') }}" defer></script>
<script>

  </script>

@endsection

  <!-- Custom fullcalendar Style -->
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
    }

    #calendar {
      max-width: 900px;
      margin: 40px auto;
    }

    .mycard {
      background-color: rgb(173, 173, 173) !important;
    }
  </style>

@section('content')

    <div class="card mycard col-12">
        <div class="card-header">
            <div class="float-left"><h4>Plans de treball </h3></div>
            <button class="mybtn btn btn-primary float-right" data-toggle="modal" data-target="#create-workplan"> Afegir un pla de treball</button>
        </div>
<!-- Provisional -->
        <div class="row">
            <div class="col"></div>
            <div class="col-10"><div id="calendar"></div></div>
            <div class="col"></div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          @csrf
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos del evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <div class="d-none">
                    ID:
                    <input type="text" name="txtID" id="txtID">
                    <br>
                    Data:
                    <input type="text" name="txtDate" id="txtDate">
                    <br>
                  </div>
                  <div class='form-row'>
                    <div class='form-group col-md-12'>
                      <label>Títol:</label>
                      {{-- <input type="text" class="form-control" name="txtTitle" id="txtTitle"> --}}
                      <select name="activity_title" class="form-control" id="activity_title">
                        <optgroup label="Selecciona una activitat">
                        @foreach ($activities as $activity)
                            <option value="{{ $activity['title'] }}">{{ $activity['title'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class='form-group col-md-6'>
                      <label>Hora de inici:</label>
                      <input type="time" min="09:00" max="19:00" step="600" class="form-control" name="startTime" id="startTime">
                    </div>
                    <div class='form-group col-md-6'>
                      <label>Hora de finalització:</label>
                      <input type="time" min="09:00" max="19:00" step="600" class="form-control" name="endTime" id="endTime">
                    </div>
                    <div class='form-group col-md-12'>
                      <label>Descripció:</label>
                      <textarea name="txtDescription" class="form-control" id="txtDescription" cols="30" rows="3"></textarea>
                    </div>
                    <div class='form-group col-md-8'>
                      <label>Professional:</label>
                      <input type="text" class="form-control" name="professional1" id="professional1">
                    </div>
                    <div class='form-group col-md-8'>
                      <label>Àrea:</label>
                      <select name="category_id" class="form-control" id="category_id">
                        <optgroup label="Selecciona una àrea">
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" style="background-color:{{ $category['color'] }}" >{{ $category['name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class='form-group col-md-4'>
                      <label>Color de fons:</label>
                      <select name="color" class="form-control" id="color">
                        <optgroup label="Selecciona un color de fons">
                        @foreach ($categories as $category)
                            <option value="{{ $category['color'] }}" style="background-color:{{ $category['color'] }}" >{{ $category['name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                      {{--
                      Professional 2:
                      <input type="text" name="txtTProfessional2" id="txtProfessional2">
                      --}}

                  </div>
                </div>
                <div class="modal-footer">
                    <button id="btnAdd" class="btn btn-success">Afegir</button>
                    <button id="btnEdit" class="btn btn-warning">Modificar</button>
                    <button id="btnDelete" class="btn btn-danger">Esborrar</button>
                    <button id="btnCancel" data-dismiss="modal" class="btn btn-secondary">Cancel·lar</button>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
