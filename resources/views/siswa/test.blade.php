@extends('layouts.master5')

@section('title')
  <title> AdminLTE 3 | Test </title>
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
              <li class="breadcrumb-item active">Data Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
          {{session('error')}}
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tahun Pelajaran 2020/2021</h3>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                    Tambah Data Siswa
                  </button>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                    AKTIVASI USER
                  </button>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                    IMPOR EXCEL
                  </button>
                  <!-- Import Excel -->
                  <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                          </div>
                          <div class="modal-body">

                            {{ csrf_field() }}

                            <label>Pilih file excel</label>
                            <div class="form-group">
                              <input type="file" name="file" required="required">
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <a href="/siswa/export_excel" class="btn btn-primary float-right btn-sm" target="_blank">EXPOR EXCEL</a>
                </div>
                <div class="col-sm-1">
                  <a href="/siswa/export_pdf" class="btn btn-primary float-right btn-sm" target="_blank">EXPOR PDF</a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                
                @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                  Data <a href="#" class="alert-link">siswa</a> {{session('sukses')}}
                </div>
                @endif

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>NAMA DEPAN</th>
                      <th>NAMA BELAKANG</th>
                      <th>NIS</th>
                      <th>JENIS KELAMIN</th>
                      <th>AGAMA</th>
                      <th>ALAMAT</th>
                      <th>STATUS</th>
                      <th>AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data_siswa as $siswa)
                      <tr>
                        <td><a href="/test/{{$siswa->id}}/profile">{{$siswa -> nama_depan}}</a></td>
                        <td><a href="/test/{{$siswa->id}}/profile">{{$siswa -> nama_belakang}}</a></td>
                        <td>{{$siswa -> nis}}</td>
                        <td>{{$siswa -> jenis_kelamin}}</td>
                        <td>{{$siswa -> agama}}</td>
                        <td>{{$siswa -> alamat}}</td>
                        
                        <td>
                          @if($siswa->status==1)
                          <a href="/test/{{$siswa->id}}/aktivasi" class="btn btn-success btn-sm" onclick="return confirm('Yakin mau diaktivasi?')" >Aktif</a>
                          @endif
                          @if($siswa->status==0)
                          <a href="/test/{{$siswa->id}}/aktivasi" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau diaktivasi?')" >Non-Aktif</a>
                          @endif
                        </td>
                        <td>
                          <a href="/test/{{$siswa->user_id}}/edit" class="btn btn-warning btn-sm">Ubah
                          </a>
                          <a href="/test/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>NAMA DEPAN</th>
                        <th>NAMA BELAKANG</th>
                        <th>NIS</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>ALAMAT</th>
                        <th>USER</th>
                        <th>AKSI</th>
                      </tr>
                    </tfoot>
                  </table>

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
                        <form action="/test/testcreate" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group {{$errors->has('nama_depan')?' has-error' : ''}}">
                                <label for="exampleFormControlInput1">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama depan" value="{{old('nama_depan')}}">
                                @if($errors->has('nama_depan'))
                                <span class="help-block">{{$errors->first('nama_depan')}}</span>
                                @endif
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="exampleFormControlInput2" placeholder="nama belakang">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group {{$errors->has('email')?' has-error' : ''}}">
                                <label for="exampleFormControlInput1">E-mail</label>
                                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan email" value="{{old('email')}}">
                                @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                                @endif
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">NIS</label>
                                <input name="nis" type="text" class="form-control" id="exampleFormControlInput3" placeholder="NIS">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">NISN</label>
                                <input name="nisn" type="text" class="form-control" id="exampleFormControlInput3" placeholder="NISN">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group {{$errors->has('jenis_kelamin')?' has-error' : ''}}">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                  <option>---</option>
                                  <option value="Laki-laki"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
                                  <option value="Perempuan"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
                                </select>
                                @if($errors->has('jenis_kelamin'))
                                <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                @endif
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group {{$errors->has('agama')?' has-error' : ''}}">
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
                                @if($errors->has('agama'))
                                <span class="help-block">{{$errors->first('agama')}}</span>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Avatar</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile"></label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                              </div>
                            </div>
                          </div>
                              @if($errors->has('avatar'))
                              <span class="help-block">{{$errors->first('avatar')}}</span>
                              @endif
                        <!-- akhir form isian data -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- End Modal -->  
              <!-- /.card-body -->
              </div>
            <!-- /.card -->
              <!-- /.card-body -->
              <div class="card-footer">
                SMP Persiapan Negeri 3 Agats
              </div>
              <!-- /.card-footer-->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-danger">
<div class="modal-dialog">
  <div class="modal-content bg-danger">
    <div class="modal-header">
      <h4 class="modal-title">Konfirmasi</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Anda yakin menghapus data ini&hellip;?</p>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-default"><a href="/test/{{$siswa->id}}/delete" siswa-id="{{$siswa->id}}">Hapus</a></button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-dialog2">
<div class="modal-dialog">
  <div class="modal-content bg-danger">
    <div class="modal-header">
      <h4 class="modal-title">Aktivasi</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Anda yakin mengaktifkan user atas nama siswa ini&hellip;?</p>

    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-default"><a href="/test/{{$siswa->id}}/aktivasi" >Aktivasi</a></button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

                          