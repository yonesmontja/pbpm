@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | Data skl </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data SKL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Form Data skl</li>
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
            <h3 class="card-title">SKL</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/skl/{{$skl->id}}/sklupdate" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Pilih Domain</label>
                <select name="skl_domain" class="form-control" id="exampleFormControlSelect1">
                  <option value="Sikap Spiritual" @if($skl->skl_domain == 'Sikap Spiritual') selected @endif>Sikap Spiritual</option>
                  <option value="Sikap Sosial" @if($skl->skl_domain == 'Sikap Sosial') selected @endif>Sikap Sosial</option>
                  <option value="Pengetahuan" @if($skl->skl_domain == 'Pengetahuan') selected @endif>Pengetahuan</option>
                  <option value="Keterampilan" @if($skl->skl_domain == 'Keterampilan') selected @endif>Keterampilan</option>
                </select>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Deskripsi SKL</label>
              		<textarea name="skl_smp" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$skl->skl_smp}}</textarea>
              	</div>
              </div>
              <div class="form-group">
              	<div class="form-group">
              		<label for="exampleFormControlTextarea1">Catatan</label>
              		<textarea name="skl_notes" class="form-control" id="exampleFormControlTextarea2" rows="3" >{{$skl->skl_notes}}</textarea>
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