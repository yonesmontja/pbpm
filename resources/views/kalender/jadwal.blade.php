<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href="{{ asset('/admin/plugins/fullcalendar-scheduler/main.css') }}" rel='stylesheet' />
    <script src="{{ asset('/admin/plugins/fullcalendar-scheduler/main.js') }}"></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'resourceTimelineWeek'
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>