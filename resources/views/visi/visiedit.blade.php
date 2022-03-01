@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | VISI </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data Visi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">VISI</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
  </section>
  <section class="content">
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
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">VISI</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/visi/{{$visi->id}}/visiupdate" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <label for="formGroupExampleInput">Mulai?</label>
                <input name="visi_start" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kapan mulai?" value="{{$visi->visi_start}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Berakhir?</label>
                <input name="visi_end" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kapan selesai?" value="{{$visi->visi_end}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">VISI</label>
                <input name="visi" type="text" class="form-control" id="formGroupExampleInput" placeholder="Visi siapa?" value="{{$visi->visi}}">
              </div>

              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Deskripsi visi</label>
              		<textarea name="visi_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$visi->visi_deskripsi}}</textarea>
              	</div>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Catatan</label>
              		<textarea name="visi_notes" class="form-control" id="exampleFormControlTextarea2" rows="3" >{{$visi->visi_notes}}</textarea>
              	</div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div><!-- /.container-fluid -->
  </section>
</div>
@stop
@section('content1')

    <h1>Edit Data visi</h1>
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    </div>
    @endif
    <div class="row">
      <div class="col-lg-12">

      </div>
    </div>
@endsection('content1')