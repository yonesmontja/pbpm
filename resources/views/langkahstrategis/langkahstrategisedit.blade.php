@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | LANGKAH STRATEGIS </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data Langkah Strategis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Langkah Strategis</li>
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
            <h3 class="card-title">Langkah Strategis</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/langkahstrategis/{{$langkahstrategis->id}}/langkahstrategisupdate" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <label for="formGroupExampleInput">Mulai?</label>
                <input name="langkahstrategis_start" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kapan mulai?" value="{{$langkahstrategis->langkahstrategis_start}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Berakhir?</label>
                <input name="langkahstrategis_end" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kapan selesai?" value="{{$langkahstrategis->langkahstrategis_end}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pilih Aspek Langkah Strategis</label>
                <select name="langkahstrategis_aspek" class="form-control" id="exampleFormControlSelect1">
                  <option value="Kurikulum" @if($langkahstrategis->langkahstrategis_aspek == 'Kurikulum') selected @endif>Kurikulum</option>
                  <option value="Pembelajaran" @if($langkahstrategis->langkahstrategis_aspek == 'Pembelajaran') selected @endif>Pembelajaran</option>
                  <option value="SDM" @if($langkahstrategis->langkahstrategis_aspek == 'SDM') selected @endif>SDM</option>
                  <option value="Sarana-Prasarana" @if($langkahstrategis->langkahstrategis_aspek == 'Sarana-Prasarana') selected @endif>Sarana-Prasarana</option>
                  <option value="Penilaian" @if($langkahstrategis->langkahstrategis_aspek == 'Penilaian') selected @endif>Penilaian</option>
                  <option value="Pengembangan Diri" @if($langkahstrategis->langkahstrategis_aspek == 'Pengembangan Diri') selected @endif>Pengembangan Diri</option>
                </select>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Deskripsi langkahstrategis</label>
              		<textarea name="langkahstrategis_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$langkahstrategis->langkahstrategis_deskripsi}}</textarea>
              	</div>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Catatan</label>
              		<textarea name="langkahstrategis_notes" class="form-control" id="exampleFormControlTextarea2" rows="3" >{{$langkahstrategis->langkahstrategis_notes}}</textarea>
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

    <h1>Edit Data langkahstrategis</h1>
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