@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | KI </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data KI</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Form Data KI</li>
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
            <h3 class="card-title">Kompetensi Inti</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/kompetensiinti/{{$ki->id}}/kompetensiintiupdate" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Pilih Domain</label>
                <select name="ki_domain" class="form-control" id="exampleFormControlSelect1">
                  <option value="Sikap Spiritual" @if($ki->ki_domain == 'Sikap Spiritual') selected @endif>Sikap Spiritual</option>
                  <option value="Sikap Sosial" @if($ki->ki_domain == 'Sikap Sosial') selected @endif>Sikap Sosial</option>
                  <option value="Pengetahuan" @if($ki->ki_domain == 'Pengetahuan') selected @endif>Pengetahuan</option>
                  <option value="Keterampilan" @if($ki->ki_domain == 'Keterampilan') selected @endif>Keterampilan</option>
                </select>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Deskripsi KI</label>
              		<textarea name="ki_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$k->ki_deskripsi}}</textarea>
              	</div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pilih Kelas</label>
                <select name="level" class="form-control" id="exampleFormControlSelect1">
                  <option value="Kelas 7" @if($ki->level == 'Kelas 7') selected @endif>Kelas 7</option>
                  <option value="Kelas 8" @if($ki->level == 'Kelas 8') selected @endif>Kelas 8</option>
                  <option value="Kelas 9" @if($ki->level == 'Kelas 9') selected @endif>Kelas 9</option>
                </select>
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

    <h1>Edit Data SKL</h1>
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