@extends('dependent-dropdown.app')

@section('content')
    <h3>Laravel Dropdown List</h3>
    <hr>
    <div class="row">
        <div class="col-md-4">
          <!-- select -->
          <div class="form-group">
            <label>Select</label>
            <select class="form-control" name="merks" id="merks">
                <option value=""></option>
                @foreach($merksmotor as $id =>$name)
              <option value="{{$name->id_merk}}">{{$name->nama_merk}}</option>
                @endforeach
            </select>
          </div>
        </div>
    </div>
    <div class="row">
        <br>
        <div class="col-md-4">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed tfix">
                <thead align="center">
                    <tr>
                        <td><b>ID Motor</b></td>
                        <td><b>ID Merk</b></td>
                        <td><b>Nama Motor</b></td>
                    </tr>
                </thead>
                <tbody id="motors">
                @foreach($motors as $motor)
                    <tr>
                        <td>{{ $motor->id_motor }}</td>
                        <td>{{ $motor->id_merk }}</td>
                        <td>{{ $motor->nama_motor }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#merks').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('merk')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#motors').empty();
                    $.each(data, function(index, element){
                        $('#motors').append("<tr><td>"+element.id_motor+"</td><td>"+element.id_merk+"</td>"+
                        "<td>"+element.nama_motor+"</td></tr>");
                    });
                });
            });
        });
    </script>
@endsection
