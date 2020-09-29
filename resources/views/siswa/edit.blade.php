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
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Ubah Data Siswa</h3>
            </div>
            <div class="panel-body">
              <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
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
                    <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                    <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
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
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                  </div>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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