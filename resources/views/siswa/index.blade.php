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
        <h3 class="panel-title">Data Siswa</h3>
        <div class="right">
          <a href="/siswa/exportExcel" class="btn btn-sm btn-primary">Export Excel</a>
          <a href="/siswa/exportPDF" class="btn btn-sm btn-primary">Export PDF</a>
          <!-- Button trigger modal -->
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
            Tambah <i class="lnr lnr-plus-circle"> Data</i>
          </button>
        </div>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>NAMA DEPAN</th>
              <th>NAMA BELAKANG</th>
              <th>JENIS KELAMIN</th>
              <th>AGAMA</th>
              <th>ALAMAT</th>
              <th>RATA-RATA NILAI</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data_siswa as $siswa)
            <tr>
              <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</td>
                <td><a href="siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</td>
                  <td>{{$siswa->jenis_kelamin}}</td>
                  <td>{{$siswa->agama}}</td>
                  <td>{{$siswa->alamat}}</td>
                  <td>{{$siswa->ratarataNilai()}}</td>
                  <td>
                    <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                    <!--a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                    <a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$siswa->id}}">Hapus</a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="/siswa/create" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group {{$errors->has('nama_depan')?' has-error' : ''}}">
          <label for="formGroupExampleInput">Nama Depan</label>
          <input name="nama_depan" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Depan" value="{{old('nama_depan')}}" >
          @if($errors->has('nama_depan'))
          <span class="help-block">{{$errors->first('nama_depan')}}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Nama Belakang</label>
          <input name="nama_belakang" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Belakang" value="{{old('nama_belakang')}}">
        </div>
        <div class="form-group {{$errors->has('email')?' has-error' : ''}}">
          <label for="formGroupExampleInput">Email</label>
          <input name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Email" value="{{old('email')}}">
          @if($errors->has('email'))
          <span class="help-block">{{$errors->first('email')}}</span>
          @endif
        </div>
        <div class="form-group {{$errors->has('jenis_kelamin')?' has-error' : ''}}">
          <label for="exampleInputEmail1">Pilih Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
            <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
            <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
          </select>
          @if($errors->has('jenis_kelamin'))
          <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
          @endif
        </div>
        <div class="form-group {{$errors->has('agama')?' has-error' : ''}}">
          <label for="exampleInputEmail1">Pilih Agama</label>
          <select name="agama" class="form-control" id="exampleFormControlSelect1">
            <option value="Islam">Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Protestan">Protestan</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Konghucu">Konghucu</option>
          </select>
          @if($errors->has('agama'))
          <span class="help-block">{{$errors->first('agama')}}</span>
          @endif
        </div>                  
        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{old('alamat')}}</textarea>
          </div>
        </div>
        <div class="form-group {{$errors->has('avatar')?' has-error' : ''}}">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Avatar</label>
            <input type="file" name="avatar" class="form-control">
          </div>
          @if($errors->has('avatar'))
          <span class="help-block">{{$errors->first('avatar')}}</span>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Submit</button>

      </form>

    </div>
  </div>
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
