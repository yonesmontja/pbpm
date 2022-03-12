<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kalender</title>

    <link href='{{('assets/fullcalendarNPM/css/fullcalendar.css')}}' rel='stylesheet'/>
    <link href='{{('assets/fullcalendarNPM/css/bootstrap.css')}}' rel='stylesheet'/>
    <link href='{{('assets/fullcalendarNPM/css/style.css')}}' rel='stylesheet'/>

</head>
<body>

<div id='wrap'>@yield('content')</div>

<div style='clear:both'></div>

<script src='{{asset('assets/fullcalendarNPM/js/fullcalendar.js')}}'></script>
<script src='{{asset('assets/fullcalendarNPM/js/jquery-and-mask-and-moment.js')}}'></script>
<script src='{{asset('assets/fullcalendarNPM/js/bootstrap.js')}}'></script>

<script src='{{asset('assets/fullcalendarNPM/js/scriptCalendar.js')}}'></script>


</body>
</html>
