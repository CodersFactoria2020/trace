document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'ca',
      contentHeight: 500,
      initialView: 'timeGridWeek', // original was month view 'dayGridMonth'
      themeSystem: 'bootstrap',
      headerToolbar: {
        left: 'prev today next', // in customButtons --> AddActivityButton
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

      // customButtons: {
      //   AddActivityButton: {
      //     text: "Afegir activitat",
      //     click: function () {
      //       alert("Hola, mundo!");
      //       $('#exampleModal').modal();
      //     }
      //   }
      // },
      dateClick: function (info) {
        clearForm();
        dateFromClick = (info.dateStr);
        dateOnly = dateFromClick.slice(0, 10);
        $('#txtDate').val(dateOnly);
        $('#btnAdd').prop("disabled", false);
        $('#btnEdit').prop("disabled", true);
        $('#btnDelete').prop("disabled", true);
        $('#exampleModal').modal();
      },
      eventClick: function(info) {
        $('#btnAdd').prop("disabled", true);
        $('#btnEdit').prop("disabled", false);
        $('#btnDelete').prop("disabled", false);          
        $('#txtID').val(info.event.id);
        $('#txtTitle').val(info.event.title);

        month = (info.event.start.getMonth() + 1);
        day = (info.event.start.getDate());
        year = (info.event.start.getFullYear());

        month = (month<10)?"0" + month : month;
        day = (day<10)?"0" + day : day;

        minutes = (info.event.start.getMinutes());
        hour = (info.event.start.getHours());

        minutes = (minutes<10)?"0" + minutes : minutes;
        hour = (hour<10)?"0" + hour : hour;

        schedule = (hour + ":" + minutes);

        $('#txtDate').val(year + "-" + month + "-" + day);
        $('#txtTime').val(schedule);
        $('#txtDescription').val(info.event.extendedProps.description);
        $('#color').val(info.event.backgroundColor);
        $('#exampleModal').modal();
      },

      events: url_show

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
        start: $('#txtDate').val() + " " + $('#txtTime').val(),
        end: $('#txtDate').val() + " " + $('#txtTime').val(),

        '_token': $("meta[name='csrf-token']").attr("content"),
        '_method': method
      }
      return (newEvent);
    }

    function sendData(action, objectEvent) {
      $.ajax(
        {
          type: "POST",
          url: url_ + action,
          data: objectEvent,
          success: function(msg){
            $('#exampleModal').modal('toggle');
            calendar.refetchEvents();          
          },
        error: function() { alert("S'ha produït un error"); }
        }
      );
    }

    function clearForm() {
      $('#txtID').val("");
      $('#txtTitle').val("");
      $('#txtDate').val("");
      $('#txtTime').val("09:00");
      $('#txtDescription').val("");
      $('#color').val("");
    }

  });