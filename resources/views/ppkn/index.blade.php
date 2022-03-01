@extends('layouts.master5')

@section('title')
  <title> AdminLTE 3 | PPKn </title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nilai PPKn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Nilai PPKn</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        {{-- notifikasi form validasi --}}
        @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif

        {{-- notifikasi sukses --}}
        @if ($sukses = Session::get('sukses'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $sukses }}</strong>
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <h3 class="card-title">Tahun Pelajaran 2020/2021</h3>
                </div>
                <div class="row">
                  ------------------------------
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <button type="button" class="btn btn-primary float-sm-left btn-sm" data-toggle="modal" data-target="#importExcel">
                      IMPOR NILAI
                    </button>

                    <!-- Import Excel -->
                    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form method="post" action="{{route('ppkn.import')}}" enctype="multipart/form-data">
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
                  <div class="col-sm-3">
                    <a href="#" class="btn btn-primary float-sm-right btn-sm" target="_blank">EXPORT EXCEL</a>
                  </div>
                  <div class="col-sm-3">
                    <a href="#" class="btn btn-primary float-sm-right btn-sm" target="_blank">EXPORT PDF</a>
                  </div>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                  Data Nilai<a href="#" class="alert-link">PPkn</a> {{session('sukses')}}
                </div>
                @endif
                @if (count($ppkn) >= 1)
                  <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA</th>
                      <th>NIS</th>
                      <th>NILAI PENGETAHUAN</th>
                      <th>PREDIKAT PENGETAHUAN</th>
                      <th>DESKRIPSI PENGETAHUAN</th>
                      <th>NILAI KETERAMPILAN</th>
                      <th>PREDIKAT KETERAMPILAN</th>
                      <th>DESKRIPSI KETERAMPILAN</th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                    @foreach($ppkn as $p)
                    
                      <tr>
                        <td>
                          {{ $no }}
                        </td>
                        
                        <td>
                          <a href="/test/{{$p->siswa->id}}/profile">{{$p->siswa['nama_depan']}} {{$p->siswa['nama_belakang']}}
                          </a>
                        </td>
                        
                        <td>
                          {{ $p ->nis}}
                        </td>
                        <td>
                          {{ $p ->nilai_pengetahuan}}
                        </td>
                        <td>
                          {{ $p ->ppeng}}
                        </td>
                        <td>
                          {{ $p ->deskripsi_pengetahuan}}
                        </td>
                        <td>
                          {{ $p ->nilai_keterampilan}}
                        </td>
                        <td>
                          {{ $p ->pketr}}
                        </td>
                        <td>
                          {{ $p ->deskripsi_keterampilan}}
                        </td>
                        <td>
                          <a href="{{ route('ppkn.edit',$p->id)}}" class="btn btn-warning btn-sm">Ubah
                          </a>
                        </td>
                        <td>
                          <button href="{{route('ppkn.destroy',$p->id)}}" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger">
                            Hapus
                          </button>
                        </td>
                      </tr>
                      @php $no++; @endphp
                      @endforeach
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NIS</th>
                        <th>NILAI PENGETAHUAN</th>
                        <th>PREDIKAT PENGETAHUAN</th>
                        <th>DESKRIPSI PENGETAHUAN</th>
                        <th>NILAI KETERAMPILAN</th>
                        <th>PREDIKAT KETERAMPILAN</th>
                        <th>DESKRIPSI KETERAMPILAN</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                  @else
                  @endif
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
      <button type="button" class="btn btn-default"><a href="#" >Hapus</a></button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
                          