@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | SWOT </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data SWOT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">SWOT</li>
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
            <h3 class="card-title">SWOT</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/swot/{{$swot->id}}/swotupdate" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <label for="formGroupExampleInput">Mulai?</label>
                <input name="swot_start" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kapan mulai?" value="{{$swot->swot_start}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Berakhir?</label>
                <input name="swot_end" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kapan selesai?" value="{{$swot->swot_end}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pilih Komponen SWOT</label>
                <select name="swot_komponen" class="form-control" id="exampleFormControlSelect1">
                  <option value="Strengths" @if($swot->swot_komponen == 'Strengths') selected @endif>Strengths</option>
                  <option value="Oportunity" @if($swot->swot_komponen == 'Oportunity') selected @endif>Oportunity</option>
                  <option value="Weakness" @if($swot->swot_komponen == 'Weakness') selected @endif>Weakness</option>
                  <option value="Threats" @if($swot->swot_komponen == 'Threats') selected @endif>Threats</option>
                </select>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Deskripsi SWOT</label>
              		<textarea name="swot_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$swot->swot_deskripsi}}</textarea>
              	</div>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Catatan</label>
              		<textarea name="swot_notes" class="form-control" id="exampleFormControlTextarea2" rows="3" >{{$swot->swot_notes}}</textarea>
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

    <h1>Edit Data swot</h1>
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