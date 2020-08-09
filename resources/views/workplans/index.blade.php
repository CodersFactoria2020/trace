@extends('layouts.dashboard-navbar')

@section('scripts')

  <!-- Bootstrap CSS -->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
  <!-- Font Awesome CSS -->
  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{ asset('fullcalendar/lib/main.css') }}">
<script src="{{ asset('fullcalendar/lib/main.js') }}"></script>
<script src="{{ asset('fullcalendar/lib/locales-all.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'ca',
        initialView: 'dayGridMonth', // 'timeGridWeek'
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
          $('#exampleModal').modal();
          console.log(info);
          calendar.addEvent({ title: "Evento X", date: info.dateStr });
        },
        eventClick: function(info) {
          console.log(info);
          console.log(info.event.title);
          console.log(info.event.start);
          
          console.log(info.event.end);
          console.log(info.event.textColor);
          console.log(info.event.backgroundColor);
          console.log(info.event.extendedProps.description);
        },

        events: [
          {
            title: "Mi evento 1",
            start: "2020-08-05 10:00:00",
            description: "Descripció de la activitat 1"
          }, {
            title: "Mi evento 2",
            start: "2020-08-06 12:30:00",
            end: "2020-08-07 12:30:00",
            color: "#FFCCAA",
            textColor: "#000000",
            description: "Descripció de la activitat 2"
          }
        ]

      });

      calendar.render();
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
  </style>

@section('content')

    <div class="card col-12">
        <div class="card-header">
            <div class="float-left"><h1>Plans de treball </h1></div>
            <button type="button" class="mybtn btn btn-primary float-right" data-toggle="modal" data-target="#create-user"> Afegir un pla de treball</button>
        </div>
<!-- Provisional -->
        <div class="row">
            <div class="col"></div>
            <div class="col-8"><div id="calendar"></div></div>
            <div class="col"></div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dades de la activitat </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <label for="txtID">ID</label>
                    <input type="text" name="txtID" id="txtID">
                    <br>
                    <label for="txtID">Data</label>
                    <input type="text" name="txtDate" id="txtDate">
                    <br>
                    <label for="txtID">Títol</label>
                    <input type="text" name="txtTitle" id="txtTitle">
                    <br>
                    <label for="txtID">Hora</label>
                    <input type="text" name="txtTime" id="txtTime">
                    <br>
                    <label for="txtID">Descripció</label>
                    <textarea name="txtDescription" id="txtDescription" cols="30" rows="10"></textarea>
                    <br>
                    <label for="txtID">Color</label>
                    <input type="color" name="txtColor" id="">
        )
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