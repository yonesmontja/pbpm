@extends('layouts.master5')

@section('title')
  <title> AdminLTE 3 | KI </title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kompetensi Inti (KI)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">KI</li>
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
              <div class="col-12">
                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                  Tambah KI
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                  Data <a href="#" class="alert-link">KI</a> {{session('sukses')}}
                </div>
                @endif

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>DOMAIN</th>
                      <th>KI</th>
                      <th>KELAS</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data_ki as $ki)
                      <tr>
                        <td>{{$ki -> ki_domain}}</td>
                        <td>{{$ki -> ki_deskripsi}}</td>
                        <td>{{$ki -> level}}</td>
                        <td>
                          <a href="/kompetensiinti/{{$ki->id}}/kompetensiintiedit" class="btn btn-warning btn-sm">Ubah
                          </a>
                          <!--a href="/ki/{{$ki->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                          <a href="/kompetensiinti/{{$ki->id}}/kompetensiintidelete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
	                      <th>DOMAIN</th>
	                      <th>KI</th>
	                      <th>KELAS</th>
	                      <th></th>
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
                        <form action="/kompetensiinti/kompetensiinticreate" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}

                         <div class="form-group {{$errors->has('ki_domain')?' has-error' : ''}}">
                          <label for="exampleFormControlSelect1">Domain</label>
                          <select name="ki_domain" class="form-control" id="exampleFormControlSelect1">
                            <option>---</option>
                            <option value="Sikap Spiritual"{{(old('ki_domain') == 'Sikap Spiritual') ? ' selected' : ''}}>Sikap Spiritual</option>
                            <option value="Sikap Sosial"{{(old('ki_domain') == 'Sikap Sosial') ? ' selected' : ''}}>Sikap Sosial</option>
                            <option value="Pengetahuan"{{(old('ki_domain') == 'Pengetahuan') ? ' selected' : ''}}>Pengetahuan</option>
                            <option value="Keterampilan"{{(old('ki_domain') == 'Keterampilan') ? ' selected' : ''}}>Keterampilan</option>
                          </select>
                          @if($errors->has('ki_domain'))
                          <span class="help-block">{{$errors->first('ki_domain')}}</span>
                          @endif
                        </div>

                          <div class="form-group {{$errors->has('ki_deskripsi')?' has-error' : ''}}">
                           <label for="exampleFormControlTextarea1">KI SMP</label>
                           <textarea name="ki_deskripsi" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis Kompetensi Inti" value="{{old('ki_deskripsi')}}" rows="3"></textarea>
                         </div>
                         @if($errors->has('ki_deskripsi'))
                         <span class="help-block">{{$errors->first('ki_deskripsi')}}</span>
                         @endif

                         <div class="form-group {{$errors->has('level')?' has-error' : ''}}">
                          <label for="exampleFormControlSelect1">Pilih Kelas</label>
                          <select name="level" class="form-control" id="exampleFormControlSelect1">
                            <option>---</option>
                            <option value="Kelas 7"{{(old('level') == 'Kelas 7') ? ' selected' : ''}}>Kelas 7</option>
                            <option value="Kelas 8"{{(old('level') == 'Kelas 8') ? ' selected' : ''}}>Kelas 8</option>
                            <option value="Kelas 9"{{(old('level') == 'Kelas 9') ? ' selected' : ''}}>Kelas 9</option>
                          </select>
                          @if($errors->has('level'))
                          <span class="help-block">{{$errors->first('level')}}</span>
                          @endif
                        </div>
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
@endsection

                          