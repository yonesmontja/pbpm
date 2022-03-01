@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | PPKn </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form PPKn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Form PPKn</li>
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
            <h3 class="card-title">PPKn</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('ppkn.update',$ppkn->id)}}" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="card-body">
            	<div class="row">
            		<div class="col-sm-6">
            			<div class="form-group">
            				<label for="formGroupExampleInput1">NIS</label>
            				<input name="nis" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Depan" value="{{$ppkn->nis}}" disabled>
            			</div>
            		</div>
            		<div class="col-sm-6">
            			<div class="form-group">
            				<label for="formGroupExampleInput2">NISN</label>
            				<input name="nisn" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Belakang" value="{{$ppkn->nisn}}" disabled>
            			</div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-sm-6">
            			<div class="form-group">
            				<label for="formGroupExampleInput3">NILAI PENGETAHUAN</label>
            				<input name="nilai_pengetahuan" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Belakang" value="{{$ppkn->nilai_pengetahuan}}">
            			</div>
            		</div>
            		<div class="col-sm-6">
            			<div class="form-group">
            				<label for="exampleInputEmail1">PREDIKAT PENGETAHUAN</label>
            				<select name="ppeng" class="form-control" id="exampleFormControlSelect1">
            					<option value="A" @if($ppkn->ppeng == 'A') selected @endif>A</option>
            					<option value="B" @if($ppkn->ppeng == 'B') selected @endif>B</option>
            					<option value="C" @if($ppkn->ppeng == 'C') selected @endif>C</option>
            					<option value="D" @if($ppkn->ppeng == 'D') selected @endif>D</option>
            				</select>
            			</div>
            		</div>
            	</div>
            	<div class="form-group">
            		<label for="exampleFormControlTextarea1">DESKRIPSI PENGETAHUAN</label>
            		<textarea name="deskripsi_pengetahuan" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$ppkn->deskripsi_pengetahuan}}</textarea>
            	</div>
            	<div class="row">
            		<div class="col-sm-6">
            			<div class="form-group">
            				<label for="formGroupExampleInput4">NILAI KETERAMPILAN</label>
            				<input name="nilai_keterampilan" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Belakang" value="{{$ppkn->nilai_keterampilan}}">
            			</div>
            		</div>
            		<div class="col-sm-6">
            			<div class="form-group">
            				<label for="exampleInputEmail2">PREDIKAT KETERAMPILAN</label>
            				<select name="pketr" class="form-control" id="exampleFormControlSelect1">
            					<option value="A" @if($ppkn->pketr == 'A') selected @endif>A</option>
            					<option value="B" @if($ppkn->pketr == 'B') selected @endif>B</option>
            					<option value="C" @if($ppkn->pketr == 'C') selected @endif>C</option>
            					<option value="D" @if($ppkn->pketr == 'D') selected @endif>D</option>
            				</select>
            			</div>
            		</div>
            	</div>
            	<div class="form-group">
            		<label for="exampleFormControlTextarea2">DESKRIPSI KETERAMPILAN</label>
            		<textarea name="deskripsi_keterampilan" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$ppkn->deskripsi_pengetahuan}}</textarea>
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

    <h1>Edit PPKn</h1>
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