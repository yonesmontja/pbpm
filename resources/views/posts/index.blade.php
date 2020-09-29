@extends('layouts.master')
@section('content')
<div class="main">
<div class="main-content">
<div class="container-fluid">
        @if(session('sukses'))
      <div class="alert alert-success" role="alert">
        {{session('sukses')}}
      </div>
      @endif

      @if(session('error'))
      <div class="alert alert-danger" role="alert">
        {{session('error')}}
      </div>
      @endif
<div class="row">
<div class col=md-12>
  <div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Posts</h3>
        <div class="right">
          <a href="#" class="btn btn-sm btn-primary">Add new Post</a>
        </div>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>TITLE</th>
              <th>USER</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->user->name}}</td>
              <td>
                <a target="_blank" href="{{route('site.single.post',$post->slug)}}" class="btn btn-info btn-sm">View</a>
                <a href="#" class="btn btn-warning btn-sm">Ubah</a>
                <a href="#" class="btn btn-danger btn-sm delete">Hapus</a>
              </tr>
              @endforeach
            </tbody>
              </table>
            </div>
          </div>
          <!-- END TABLE HOVER -->
        </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- tutup class col=md-12 -->
</div>

@stop

@section('footer')
<script>
  //swal("Hello World");
  $('.delete').click(function(){
    var siswa_id = $(this).attr('siswa-id');
    //alert(siswa_id);
    swal({
      title: "Anda yakin menghapus data siswa dengan id "+siswa_id+" ini?",
      text: "Sekali dihapus, Anda tidak dapat mengembalikan data ini!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      console.log(willDelete);
      if (willDelete) {
        //swal("Berhasil! Data Anda sudah dihapus!", {
          //icon: "success",
        //});
        window.location = "/siswa/"+siswa_id+"/delete";
      } else {
        swal("Data Anda aman!");
      }
    });
  });
</script>

@stop
