@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | SWOT ANALYSIS </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data SWOT Analysis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">SWOT Analysis</li>
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
            <h3 class="card-title">SWOT Analysis</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/swotanalysis/{{$swotanalysis->id}}/swotanalysisupdate" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <label for="formGroupExampleInput">Mulai?</label>
                <input name="swotanalysis_start" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kapan mulai?" value="{{$swotanalysis->swotanalysis_start}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Berakhir?</label>
                <input name="swotanalysis_end" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kapan selesai?" value="{{$swotanalysis->swotanalysis_end}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pilih Kuadran</label>
                <select name="swotanalysis_kuadran" class="form-control" id="exampleFormControlSelect1">
                  <option value="Kuadran 1" @if($swotanalysis->swotanalysis_kuadran == 'Kuadran 1') selected @endif>Kuadran 1</option>
                  <option value="Kuadran 2" @if($swotanalysis->swotanalysis_kuadran == 'Kuadran 2') selected @endif>Kuadran 2</option>
                  <option value="Kuadran 3" @if($swotanalysis->swotanalysis_kuadran == 'Kuadran 3') selected @endif>Kuadran 3</option>
                  <option value="Kuadran 4" @if($swotanalysis->swotanalysis_kuadran == 'Kuadran 4') selected @endif>Kuadran 4</option>
                </select>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Deskripsi swotanalysis</label>
              		<textarea name="swotanalysis_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$swotanalysis->swotanalysis_deskripsi}}</textarea>
              	</div>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Catatan</label>
              		<textarea name="swotanalysis_notes" class="form-control" id="exampleFormControlTextarea2" rows="3" >{{$swotanalysis->swotanalysis_notes}}</textarea>
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

    <h1>Edit Data swotanalysis</h1>
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