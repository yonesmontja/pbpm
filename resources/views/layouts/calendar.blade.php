<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('title')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- linear icons -->
    <link rel="stylesheet" href="{{ asset('/admin/linearicons/WebFont/style.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.includes._navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.includes._sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        @include('layouts.includes._footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/admin/dist/js/demo.js') }}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <!--<script src="{{ asset('/admin/plugins/fullcalendar/main.min.js') }}"></script>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var booking = @json($events);
            //console.log(booking);
            $('#calendar').fullCalendar({
                header: {
                    'left': 'prev, next today',
                    'center': 'title',
                    'right': 'month, agendaWeek, agendaDay',
                },
                events: booking,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {
                    //console.log(start)
                    // to show modal from jquery
                    $('#bookingModal').modal('toggle');
                    $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        //console.log(title);
                        var start_date = moment(start).format('YYYY-MM-DD');
                        //console.log(start_date);
                        var end_date = moment(end).format('YYYY-MM-DD');

                        $.ajax({
                            url: "{{ route('kalender.instorecalendar') }}",
                            type: "POST",
                            dateType: 'json',
                            data: {
                                title,
                                start_date,
                                end_date
                            },
                            success: function(response) {
                                $('#bookingModal').modal('hide')
                                //console.log(response)
                                $('#calendar').fullCalendar('renderEvent', {
                                    'title': response.title,
                                    'start': response.start,
                                    'end': response.end,
                                    'color': response.color
                                });
                            },
                            error: function(error) {
                                if (error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors
                                        .title);

                                }
                            },
                        });
                    });
                },
                editable: true,
                eventDrop: function(event) {
                    //console.log(event)
                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD');
                    //console.log(start_date);
                    var end_date = moment(event.end).format('YYYY-MM-DD');
                    $.ajax({
                        url: "{{ route('kalender.inupdatecalendar', '') }}" + '/' + id,
                        type: "PATCH",
                        dateType: 'json',
                        data: {
                            start_date,
                            end_date
                        },
                        success: function(response) {
                            swal("Good job!", "Event updated!", "success");
                        },
                        error: function(error) {
                            console.log(error)
                        },
                    });
                },
                eventClick: function(event) {
                    //console.log(event)
                    var id = event.id;
                    if (confirm('Are you sure want to remove it?')) {
                        $.ajax({
                            url: "{{ route('kalender.indeletecalendar', '') }}" + '/' + id,
                            type: "DELETE",
                            dateType: 'json',
                            //data: { start_date, end_date },
                            success: function(response) {
                                //var id = response
                                //console.log(id)
                                $('#calendar').fullCalendar('removeEvents', response);
                                swal("Good job!", "Event Deleted!", "success");
                            },
                            error: function(error) {
                                console.log(error)
                            },
                        });
                    }

                },

                selectAllow: function(event) {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1,
                        'second').utcOffset(false), 'day');
                }

            });

            $("#bookingModal").on("hidden.bs.modal", function() {
                $('#saveBtn').unbind();
            });
            $('.fc-event').css('font-size', '10px');
            $('.fc-event').css('width', '60px');
            //$('.fc-event').css('border-radius','50%');
        });
    </script>
    @yield('footer')
</body>

</html>
