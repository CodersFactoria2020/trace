@extends('layouts.dashboard-navbar')

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
    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'ca',
        initialView: 'dayGridMonth', // maybe change to 'timeGridWeek'
        themeSystem: 'bootstrap',
        headerToolbar: {
          left: 'prev today next AddActivityButton',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        titleFormat: { year: 'numeric', month: 'long' },
        dayHeaderFormat: { weekday: 'long', day: 'numeric' },
        weekends: false, // hides Sunday and Saturday
        allDaySlot: false,
        slotDuration: '00:15:00',
        slotMinTime: '09:00:00',
        slotMaxTime: '19:00:00',
        buttonIcons: false, // show the prev/next text
        weekNumbers: false,
        navLinks: false, // can click day/week names to navigate views
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events

        customButtons: {
          AddActivityButton: {
            text: "Afegir activitat",
            click: function () {
              alert("Hola, mundo!");
              $('#exampleModal').modal();
            }
          }
        },
        dateClick: function (info) {

          $('#txtDate').val(info.dateStr);

          $('#exampleModal').modal();
          // console.log(info);
          // calendar.addEvent({ title: "Evento X", date: info.dateStr });
        },
        eventClick: function(info) {
          console.log(info);
          console.log(info.event.title);
          console.log(info.event.start);
          
          console.log(info.event.end);
          console.log(info.event.textColor);
          console.log(info.event.backgroundColor);
          console.log(info.event.extendedProps.description);

          $('#txtID').val(info.event.id);
          $('#txtTitle').val(info.event.title);

          month = (info.event.start.getMonth() + 1);
          day = (info.event.start.getDate());
          year = (info.event.start.getFullYear());

          month = (month<10)?"0" + month : month;
          day = (day<10)?"0" + day : day;

          time = (info.event.start.getHours() + ":" + info.event.start.getMinutes());

          $('#txtDate').val(year + "-" + month + "-" + day);
          $('#txtTime').val(time);
          $('#txtDescription').val(info.event.extendedProps.description);
          $('#color').val(info.event.backgroundColor);
          $('#exampleModal').modal();
        },

        events: "{{ url('eventos/show') }}"

      });

      calendar.render();

      $('#btnAdd').click(function() {
        objectEvent = gatherDataGUI("POST");
        sendData('', objectEvent);
      });

      $('#btnDelete').click(function() {
        objectEvent = gatherDataGUI("DELETE");
        sendData('/' + $('#txtID').val(), objectEvent);
      });

      $('#btnEdit').click(function() {
        objectEvent = gatherDataGUI("PATCH");
        sendData('/' + $('#txtID').val(), objectEvent);
      });

      function gatherDataGUI(method) {

        newEvent={
          id: $('#txtID').val(),
          title: $('#txtTitle').val(),
          description: $('#txtDescription').val(),
          color: $('#color').val(),
          textColor: '#FFFFFF',
          start: $('#txtDate').val()+ " "+$('#txtTime').val(),
          end: $('#txtDate').val()+ " "+$('#txtTime').val(),

          '_token': $("meta[name='csrf-token']").attr("content"),
          '_method': method
        }
        return (newEvent);

      }
      function sendData(action, objectEvent) {
        $.ajax(
          {
            type: "POST",
            url: "{{ url('/eventos') }}" + action,
            data: objectEvent,
            success: function(msg){
              console.log(msg);
            
              $('#exampleModal').modal('toggle');
              calendar.refetchEvents();
            
            },
          error: function() { alert("S'ha produït un error"); }
          }
        );
      }

    });
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
            <div class="float-left"><h1>Plans de treball </h1></div>
            <button type="button" class="mybtn btn btn-primary float-right" data-toggle="modal" data-target="#create-workplan"> Afegir un pla de treball</button>
        </div>
<!-- Provisional -->
        <div class="row">
            <div class="col"></div>
            <div class="col-8"><div id="calendar"></div></div>
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
                    ID:
                    <input type="text" name="txtID" id="txtID">
                    <br>
                    Data:
                    <input type="text" name="txtDate" id="txtDate">
                    <br>
                    Títol:
                    <input type="text" name="txtTitle" id="txtTitle">
                    <br>
                    Hora de inici:
                    <input type="text" name="txtTime" id="txtTime">
                    <br>
                    {{-- Hora de finalització:
                    <input type="text" name="txtTime" id="txtTime">
                    <br>
                    Professional 1:
                    <input type="text" name="txtTProfessional1" id="txtProfessional1">
                    <br>
                    Professional 2:
                    <input type="text" name="txtTProfessional2" id="txtProfessional2">
                    <br> --}}
                    Descripció:
                    <textarea name="txtDescription" id="txtDescription" cols="30" rows="10"></textarea>
                    <br>
                    Color:
                    <input type="color" name="color" id="color">
                    <br>
                    {{-- Àrea:
                    <input type="text" name="category_id" id="category_id">
                    <br> --}}
                  </div>
                  <div class="modal-footer">
                      <button id="btnAdd" class="btn btn-success">Afegir</button>
                      <button id="btnEdit" class="btn btn-warning">Modificar</button>
                      <button id="btnDelete" class="btn btn-danger">Esborrar</button>
                      <button id="btnCancel" class="btn btn-secondary">Cancel·lar</button>
                  </div>
            </div>
            </div>
        </div>
    </div>

@endsection