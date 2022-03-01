@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | Data Siswa </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Form Data Siswa</li>
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
            <h3 class="card-title">Data Siswa</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <label for="formGroupExampleInput">Nama Depan</label>
                <input name="nama_depan" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Depan" value="{{$siswa->nama_depan}}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Nama Belakang</label>
                <input name="nama_belakang" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Belakang" value="{{$siswa->nama_belakang}}">
              </div>
              <div class="form-group {{$errors->has('email')?' has-error' : ''}}">
                <label for="formGroupExampleInput">Email</label>
                <input name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Email" value="{{old('email')}}">
                @if($errors->has('email'))
                <span class="help-block">{{$errors->first('email')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pilih Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                  <option value="Laki-laki" @if($siswa->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                  <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pilih Agama</label>
                <select name="agama" class="form-control" id="exampleFormControlSelect1">
                  <option value="Islam" @if($siswa->agama == 'Islam') selected @endif>Islam</option>
                  <option value="Katolik" @if($siswa->agama == 'Katolik') selected @endif>Katolik</option>
                  <option value="Protestan" @if($siswa->agama == 'Protestan') selected @endif>Protestan</option>
                  <option value="Budha" @if($siswa->agama == 'Budha') selected @endif>Budha</option>
                  <option value="Hindu" @if($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                  <option value="Konghucu" @if($siswa->agama == 'Konghucu') selected @endif>Konghucu</option>
                </select>
              </div>                  
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Alamat</label>
                  <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$siswa->alamat}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Avatar</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text" id="">Upload</span>
                  </div>
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

    <h1>Edit Data Siswa</h1>
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