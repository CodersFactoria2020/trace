document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'ca',
      contentHeight: 600,
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
      slotDuration: '00:30:00',
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
        $('#activity_title').val(info.event.title);

        month = (info.event.start.getMonth() + 1);
        day = (info.event.start.getDate());
        year = (info.event.start.getFullYear());

        month = (month<10)?"0" + month : month;
        day = (day<10)?"0" + day : day;

        minutesStart = (info.event.start.getMinutes());
        hoursStart = (info.event.start.getHours());
        minutesStart = (minutesStart<10)?"0" + minutesStart : minutesStart;
        hoursStart = (hoursStart<10)?"0" + hoursStart : hoursStart;

        scheduleStart = (hoursStart + ":" + minutesStart);
        
        minutesEnd = (info.event.start.getMinutes());
        hoursEnd = (info.event.start.getHours());
        minutesEnd = (minutesEnd<10)?"0" + minutesEnd : minutesEnd;
        hoursEnd = (hoursEnd<10)?"0" + hoursEnd : hoursEnd;
        scheduleEnd = (hoursEnd + ":" + minutesEnd);

        $('#txtDate').val(year + "-" + month + "-" + day);
        $('#startTime').val(scheduleStart);
        $('#endTime').val(scheduleEnd);
        $('#txtDescription').val(info.event.extendedProps.description);
        $('#professional1').val(info.event.extendedProps.professional1);
        $('#category_id').val(info.event.extendedProps.category_id);
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
      var retVal = confirm("CONFIRMACIÓ: Esborrar aquest esdeveniment?");
      if (retVal == true) {
        sendData('/' + $('#txtID').val(), objectEvent);
      }
      return false;      
    });

    $('#btnEdit').click(function() {
      objectEvent = gatherDataGUI("PATCH");
     sendData('/' + $('#txtID').val(), objectEvent);
    });

    function gatherDataGUI(method) {
      newEvent={
        id: $('#txtID').val(),
        title: $('#activity_title').val(),
        description: $('#txtDescription').val(),
        color: $('#color').val(),
        textColor: '#000000',
        start: $('#txtDate').val() + " " + $('#startTime').val(),
        end: $('#txtDate').val() + " " + $('#endTime').val(),
        professional1: $('#professional1').val(),
        category_id: $('#category_id').val(),

        '_token': $("meta[name='csrf-token']").attr("content"),
        '_method': method
      }
      //  console.log(newEvent);
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
      $('#activity_title').val("");
      $('#startTime').val("09:00");
      $('#endTime').val("");
      $('#txtDescription').val("");
      $('#professional1').val("");
      $('#color').val("");
      $('#category_id').val("");
    }

  });