<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Full Calendar js</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
</head> 
<body>
<div class="container">  
<div class="row">
<div class="col-12">
<h3 class="text-center mt-5">Fullcalendar Js Laravel</h3>
<div class="col-md-11 offset-1 mt-5 mb-5">
<div id="calendar">
</div>
</div>
</div>  
</div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Input Event
</button>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="title">
        <span id="titleError" class="text-danger"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
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
            select: function(start, end, allDays){
                //console.log(start)
                // to show modal from jquery
                $('#bookingModal').modal('toggle');
                $('#saveBtn').click(function(){
                    var title = $('#title').val();
                    //console.log(title);
                    var start_date = moment(start).format('YYYY-MM-DD');
                    //console.log(start_date);
                    var end_date = moment(end).format('YYYY-MM-DD');

                    $.ajax({
                        url:"{{ route('kalender.instorecalendar') }}",
                        type: "POST",
                        dateType: 'json',
                        data: { title, start_date, end_date },
                        success: function(response)
                        {
                            $('#bookingModal').modal('hide')
                            //console.log(response)
                            $('#calendar').fullCalendar('renderEvent',{
                                'title': response.title,
                                'start': response.start,
                                'end': response.end,
                                'color': response.color
                            });
                        },
                        error: function(error)
                        {
                            if(error.responseJSON.errors){
                                $('#titleError').html(error.responseJSON.errors.title);
                                
                            }
                        },
                    });
                });
            },
            editable: true,
            eventDrop: function(event){
                //console.log(event)
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD');
                    //console.log(start_date);
                var end_date = moment(event.end).format('YYYY-MM-DD');
                    $.ajax({
                        url:"{{ route('kalender.inupdatecalendar', '') }}" +'/'+ id,
                        type: "PATCH",
                        dateType: 'json',
                        data: { start_date, end_date },
                        success: function(response)
                        {
                            swal("Good job!", "Event updated!", "success");
                        },
                        error: function(error)
                        {
                            console.log(error)
                        },
                    });
            },
            eventClick: function(event){
                //console.log(event)
                var id = event.id;
                if(confirm('Are you sure want to remove it?')){
                    $.ajax({
                        url:"{{ route('kalender.indeletecalendar', '') }}" +'/'+ id,
                        type: "DELETE",
                        dateType: 'json',
                        //data: { start_date, end_date },
                        success: function(response)
                        {
                            //var id = response
                            //console.log(id)
                            $('#calendar').fullCalendar('removeEvents', response);
                            swal("Good job!", "Event Deleted!", "success");
                        },
                        error: function(error)
                        {
                            console.log(error)
                        },
                    }); 
                }
   
            },
            selectAllow: function(event)
            {
                return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1,'second').utcOffset(false),'day');
            }

        });
        
        $("#bookingModal").on("hidden.bs.modal",function(){
            $('#saveBtn').unbind();
        });
        $('.fc-event').css('font-size','10px');
        $('.fc-event').css('width','60px');
        //$('.fc-event').css('border-radius','50%');
    });
</script>
</body>
</html> 
