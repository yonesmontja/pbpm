@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | Data Siswa </title>
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Siswa</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                  @if(session('sukses'))
                  <div class="alert alert-success" role="alert">
                    Data <a href="#" class="alert-link">siswa</a> {{session('sukses')}}
                  </div>
                  @endif
                  <div class="row">
                    <div class="col-6">
                      <h5>Tahun Pelajaran 2020/2021</h5>
                    </div>
                    <div class="col-6">

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        Tambah Data Siswa
                      </button>
                    </div>

                    <table class="table table-hover">
                      <thread>
                        <tr>
                          <th>NAMA DEPAN</th>
                          <th>NAMA BELAKANG</th>
                          <th>NIS</th>
                          <th>JENIS KELAMIN</th>
                          <th>AGAMA</th>
                          <th>ALAMAT</th>
                          <th>AKSI</th>
                        </tr>
                      </thread>
                      <tbody>
                        @foreach($data_siswa as $siswa)
                          <tr>
                            <td>{{$siswa -> nama_depan}}</td>
                            <td>{{$siswa -> nama_belakang}}</td>
                            <td>{{$siswa -> nis}}</td>
                            <td>{{$siswa -> jenis_kelamin}}</td>
                            <td>{{$siswa -> agama}}</td>
                            <td>{{$siswa -> alamat}}</td>
                            <td>
                              <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                              <!--a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                              <a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$siswa->id}}">Hapus</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- form isian data -->
                        <form action="/siswa/create" method="POST">
                          {{csrf_field()}}
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama depan" value="{{old('nama_depan')}}">
                            @if($errors->has('nama_depan'))
                            <span class="help-block">{{$errors->first('nama_depan')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="exampleFormControlInput2" placeholder="nama belakang">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">NIS</label>
                            <input name="nis" type="text" class="form-control" id="exampleFormControlInput3" placeholder="NIS">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">NISN</label>
                            <input name="nisn" type="text" class="form-control" id="exampleFormControlInput3" placeholder="NISN">
                          </div>
                          <div class="form-group {{$errors->has('email')?' has-error' : ''}}">
                            <label for="formGroupExampleInput3">Email</label>
                            <input name="email" type="email" class="form-control" id="formGroupExampleInput3" placeholder="Masukkan Email" value="{{old('email')}}">
                            @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                          </div>
                          <div class="form-group {{$errors->has('jenis_kelamin')?' has-error' : ''}}">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                              <option>---</option>
                              <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
                              <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
                            </select>
                            @if($errors->has('jenis_kelamin'))
                            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Agama</label>
                            <select name="agama" class="form-control" id="exampleFormControlSelect2">
                              <option>---</option>
                              <option>Islam</option>
                              <option>Kristen Protestan</option>
                              <option>Kristen Katolik</option>
                              <option>Budha</option>
                              <option>Hindu</option>
                              <option>Konghucu</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                        <!-- akhir form isian data -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- End Modal -->  


              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                SMP Persiapan Negeri 3 Agats
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>


  
  <!-- /.content-wrapper -->
  @endsection