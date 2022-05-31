 @extends('layouts.mailbox')

 @section('title')
     <title> SD Dabolding Compose </title>
 @endsection
 @section('header')
     <style type="text/css">
         /* Chart.js */
         @keyframes chartjs-render-animation {
             from {
                 opacity: .99
             }

             to {
                 opacity: 1
             }
         }

         .chartjs-render-monitor {
             animation: chartjs-render-animation 1ms
         }

         .chartjs-size-monitor,
         .chartjs-size-monitor-expand,
         .chartjs-size-monitor-shrink {
             position: absolute;
             direction: ltr;
             left: 0;
             top: 0;
             right: 0;
             bottom: 0;
             overflow: hidden;
             pointer-events: none;
             visibility: hidden;
             z-index: -1
         }

         .chartjs-size-monitor-expand>div {
             position: absolute;
             width: 1000000px;
             height: 1000000px;
             left: 0;
             top: 0
         }

         .chartjs-size-monitor-shrink>div {
             position: absolute;
             width: 200%;
             height: 200%;
             left: 0;
             top: 0
         }

     </style>
     <link href="{{ asset('bootstrap3-editable/css/bootstrap-editable.css') }}" rel="stylesheet">
 @endsection
 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Profil Siswa</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="/tdu">Home</a></li>
                             <li class="breadcrumb-item active">Profil Siswa</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>
         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 @if (session('sukses'))
                     <div class="alert alert-success" role="alert">
                         {{ session('sukses') }}
                     </div>
                 @endif
                 @if (session('error'))
                     <div class="alert alert-danger" role="alert">
                         {{ session('error') }}
                     </div>
                 @endif
                 <div class="row">
                     <div class="col-md-3">
                         <!-- Profile Image -->
                         <div class="card card-primary card-outline">
                             <div class="card-body box-profile">
                                 <div class="text-center">
                                     <img class="profile-user-img img-fluid img-circle" src="{{ $siswa->avatar() }}"
                                         alt="User profile picture">
                                 </div>
                                 <h3 class="profile-username text-center"><a href="#">{{ $siswa->nama_depan }}
                                         {{ $siswa->nama_belakang }}</a></h3>
                                 <p class="text-muted text-center">{{ $rombel2 }}</p>
                                 <ul class="list-group list-group-unbordered mb-3">
                                     <li class="list-group-item">
                                         <b>Penilaian</b> <a class="float-right">{{ $mapel1 }}</a>
                                     </li>
                                     <li class="list-group-item">
                                         <b>Total Nilai Semua Penilaian</b> <a
                                             class="float-right">{{ $matpel }}</a>
                                     </li>
                                     <li class="list-group-item">
                                         <b>Rata-rata Semua Penilaian</b> <a
                                             class="float-right">{{ (int) $average }}</a>
                                     </li>
                                 </ul>
                                 <a href="/test/{{ $siswa->id }}/edit" class="btn btn-primary btn-block"><b>Ubah
                                         Profil</b></a>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                         <!-- About Me Box -->
                         <div class="card card-primary">
                             <div class="card-header">
                                 <h3 class="card-title">Tentang saya</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <strong><i class="fas fa-book mr-1"></i> Lahir pada tanggal</strong>
                                 <p class="text-muted">
                                     {{ $siswa->tgl_lahir }}
                                 </p>
                                 <hr>
                                 <strong><i class="fas fa-map-marker-alt mr-1"></i> Lahir di</strong>
                                 <p class="text-muted">{{ $siswa->tempat_lahir }}</p>
                                 <hr>
                                 <hr>
                                 <strong><i class="fas fa-map-marker-alt mr-1"></i> Tinggal di</strong>
                                 <p class="text-muted">{{ $siswa->alamat }}</p>
                                 <hr>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                     <!-- /.col -->
                     <div class="col-md-9">
                         <div class="card">
                             <div class="card-header p-2">
                                 <ul class="nav nav-pills">
                                     <li class="nav-item"><a class="nav-link active" href="#nilai"
                                             data-toggle="tab">Tabel Nilai</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#grafiknilai"
                                             data-toggle="tab">Grafik Nilai</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#activity"
                                             data-toggle="tab">Nilai Rata-Rata Mapel</a></li>

                                 </ul>
                             </div><!-- /.card-header -->
                             <div class="card-body">
                                 <div class="tab-content">
                                     <!-- /.tab-pane -->
                                     <div class="active tab-pane" id="nilai">
                                         <div class="card">
                                             <div class="card-header">
                                                 <div class="row">
                                                     <div class="col-md-3">
                                                         <h3 class="card-title">Nilai Siswa</h3>
                                                     </div>
                                                     <div class="col-md-3">
                                                         <h3 class="card-title">
                                                             <a href="/siswa/{{ $siswa->id }}/export_pdf" target="_blank">CETAK RAPORT
                                                             </a>
                                                         </h3>
                                                     </div>
                                                     <div class="col-md-2 float-right">
                                                         <div class="card-tools">
                                                             <button type="button" class="btn btn-primary float-right"
                                                                 data-toggle="modal" data-target="#exampleModal">
                                                                 Tambah Nilai
                                                             </button>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-4">
                                                         <div class="card-tools">
                                                             <ul class="pagination pagination-sm float-right">
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">«</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">1</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">2</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">3</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">»</a></li>
                                                             </ul>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body table-responsive p-0">
                                                 <table class="table table-hover text-nowrap">
                                                     <thead>
                                                         <tr>
                                                             <th style="width: 10px">Kode Mapel</th>
                                                             <th>Mapel</th>
                                                             <th>Semester</th>
                                                             <th>Penilaian</th>
                                                             <th></th>
                                                             <th style="width: 40px">Nilai</th>
                                                             <th style="width: 40px">Guru</th>
                                                             <th></th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($nilai as $key)
                                                             @if ($key->siswa_id == $id1)
                                                                 <tr>
                                                                     <td>{{ $key->mapel->kode }}</td>
                                                                     <td>
                                                                         <a
                                                                             href="/mapel/{{ $key->mapel_id }}">{{ $key->mapel->nama_mapel }}</a>
                                                                     </td>
                                                                     <td>{{ $key->mapel->semester }}</td>
                                                                     <td>
                                                                         <a
                                                                             href="/penilaian/{{ $key->penilaian_id }}/profile">

                                                                             {{ $key->penilaian->nama_tes }}
                                                                         </a>
                                                                     </td>
                                                                     <td>
                                                                         <div class="progress progress-xs">
                                                                             <div class="progress-bar progress-bar-danger"
                                                                                 style="width: {{ $key->nilai }}%">
                                                                             </div>
                                                                         </div>
                                                                     </td>
                                                                     <td>
                                                                         <a href="" class="update" data-name="nilai"
                                                                             data-url="/siswa/editnilai" data-type="text"
                                                                             data-pk="{{ $key -> id }}"
                                                                             data-title="Masukkan nilai">{{ $key->nilai }}</a>
                                                                     </td>
                                                                     <td>
                                                                         <a href="/guru/{{ $key->guru_id }}/profile">
                                                                             {{ $key->guru->nama_guru }}
                                                                         </a>
                                                                     </td>
                                                                     <td>
                                                                         <a href="/test/{{ $siswa->id }}/{{ $key->id }}/testdeletenilai"
                                                                             class="btn btn-danger btn-sm"
                                                                             onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
                                                                     </td>
                                                                 </tr>
                                                             @endif
                                                         @endforeach
                                                     </tbody>
                                                 </table>
                                             </div>
                                             <!-- /.card-body -->
                                         </div>
                                     </div>
                                     <!-- /.tab-pane -->
                                     <div class="tab-pane" id="grafiknilai">
                                         <div class="card">
                                             <div class="card-header">
                                                 <div class="row">
                                                     <div class="col-md-6">
                                                         <h3 class="card-title">Grafik Nilai</h3>
                                                     </div>
                                                     <div class="col-md-2 float-right">
                                                         <div class="card-tools">
                                                             <button type="button" class="btn btn-primary float-right"
                                                                 data-toggle="modal" data-target="#exampleModal">
                                                                 Tambah Nilai
                                                             </button>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-4">
                                                         <div class="card-tools">
                                                             <ul class="pagination pagination-sm float-right">
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">«</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">1</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">2</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">3</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">»</a></li>
                                                             </ul>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body p-0">
                                                 <div class="card card-success">
                                                     <div class="card-header">
                                                         <h3 class="card-title">Nilai Siswa</h3>
                                                         <div class="card-tools">
                                                             <button type="button" class="btn btn-tool"
                                                                 data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                             </button>
                                                             <button type="button" class="btn btn-tool"
                                                                 data-card-widget="remove"><i
                                                                     class="fas fa-times"></i></button>
                                                         </div>
                                                     </div>
                                                     <div class="card-body">
                                                         <div class="chart">
                                                             <div class="chartjs-size-monitor">
                                                                 <div class="chartjs-size-monitor-expand">
                                                                     <div class=""></div>
                                                                 </div>
                                                                 <div class="chartjs-size-monitor-shrink">
                                                                     <div class=""></div>
                                                                 </div>
                                                             </div>
                                                             <canvas id="barChart"
                                                                 style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 757px;"
                                                                 width="757" height="250"
                                                                 class="chartjs-render-monitor"></canvas>
                                                             <div class="chart">
                                                                 <div class="chartjs-size-monitor">
                                                                     <div class="chartjs-size-monitor-expand">
                                                                         <div class=""></div>
                                                                     </div>
                                                                     <div class="chartjs-size-monitor-shrink">
                                                                         <div class=""></div>
                                                                     </div>
                                                                 </div>
                                                                 <canvas id="barChart2"
                                                                     style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 757px;"
                                                                     width="757" height="250"
                                                                     class="chartjs-render-monitor"></canvas>
                                                             </div>

                                                         </div>
                                                         <div class="chart">
                                                             <div class="chart">
                                                                 <div class="chartjs-size-monitor">
                                                                     <div class="chartjs-size-monitor-expand">
                                                                         <div class=""></div>
                                                                     </div>
                                                                     <div class="chartjs-size-monitor-shrink">
                                                                         <div class=""></div>
                                                                     </div>
                                                                 </div>
                                                                 <canvas id="barChart2"
                                                                     style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 757px;"
                                                                     width="757" height="250"
                                                                     class="chartjs-render-monitor"></canvas>
                                                             </div>
                                                         </div>
                                                         <!-- /.card-body -->
                                                     </div>
                                                 </div>
                                                 <!-- /.card-body -->
                                             </div>
                                         </div>
                                     </div>
                                     <!-- /.tab-pane -->
                                     <div class="active tab-pane" id="activity">
                                         <div class="card">
                                             <div class="card-header">
                                                 <div class="row">
                                                     <div class="col-md-4">
                                                         <h3 class="card-title">Rata-rata Mapel</h3>
                                                     </div>
                                                     <div class="col-md-4">
                                                         <h3 class="card-title">{{ $average_mapel }}</h3>
                                                     </div>
                                                     <div class="col-md-4">
                                                         <div class="card-tools">
                                                             <ul class="pagination pagination-sm float-right">
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">«</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">1</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">2</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">3</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                         href="#">»</a></li>
                                                             </ul>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body table-responsive p-0">
                                                 <table class="table table-hover text-nowrap">
                                                     <thead>
                                                         <tr>
                                                             <th>Mapel</th>
                                                             <th></th>
                                                             <th style="width: 40px">Nilai</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($mapel3 as $key8 => $m)
                                                             <tr>
                                                                 <td>
                                                                     <a
                                                                         href="/mapel/{{ $key8 + 1 }}">{{ $m }}</a>
                                                                 </td>
                                                                 @foreach ($matang1 as $key9 => $n)
                                                                     @if ($key9 == $key8)
                                                                         <td>
                                                                             <div class="progress progress-xs">
                                                                                 <div class="progress-bar progress-bar-danger"
                                                                                     style="width: {{ $n }}%">
                                                                                 </div>
                                                                             </div>
                                                                         </td>
                                                                     @endif
                                                                 @endforeach
                                                                 @foreach ($matang1 as $key10 => $o)
                                                                     @if ($key10 == $key8)
                                                                         <td>{{ $o }}</td>
                                                                     @endif
                                                                 @endforeach
                                                             </tr>
                                                         @endforeach
                                                     </tbody>
                                                 </table>
                                             </div>
                                             <!-- /.card-body -->
                                         </div>
                                     </div>
                                     <!-- /.tab-content -->
                                 </div><!-- /.card-body -->
                             </div>
                             <!-- /.nav-tabs-custom -->
                         </div>
                         <!-- /.col -->
                     </div>
                     <!-- /.row -->
                 </div><!-- /.container-fluid -->
         </section>
         <!-- /.content -->
     </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Mata Pelajaran</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <!-- form isian data -->
                     <form action="/nilai/nilaicreate" method="POST" enctype="multipart/form-data">
                         {{ csrf_field() }}
                         <div class="row">
                             <div class="col-sm-4">
                                 <div class="form-group {{ $errors->has('nilai_start') ? ' has-error' : '' }}">
                                     <label for="exampleFormControlInput1">Mulai</label>
                                     <input name="nilai_start" type="text" class="form-control"
                                         id="exampleFormControlInput1" placeholder="Kapan mulai?"
                                         value="{{ $nilai_start[0] }}">
                                     @if ($errors->has('nilai_start'))
                                         <span class="help-block">{{ $errors->first('nilai_start') }}</span>
                                     @endif
                                 </div>
                                 @if ($errors->has('nilai_start'))
                                     <span class="help-block">{{ $errors->first('nilai_start') }}</span>
                                 @endif
                             </div>
                             <div class="col-sm-4">
                                 <div class="form-group {{ $errors->has('nilai_end') ? ' has-error' : '' }}">
                                     <label for="exampleFormControlInput1">Berakhir</label>
                                     <input name="nilai_end" type="text" class="form-control"
                                         id="exampleFormControlInput1" placeholder="Kapan selesai?"
                                         value="{{ $nilai_end[0] }}">
                                     @if ($errors->has('nilai_end'))
                                         <span class="help-block">{{ $errors->first('nilai_end') }}</span>
                                     @endif
                                 </div>
                                 @if ($errors->has('nilai_end'))
                                     <span class="help-block">{{ $errors->first('nilai_end') }}</span>
                                 @endif
                             </div>
                             <div class="col-sm-4">
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">PENILAIAN</label>
                                     <select name="penilaian_id" class="form-control" id="exampleFormControlSelect2">
                                         <option>---</option>
                                         @foreach ($penilaian as $key => $m)
                                             <option value="{{ $m->id }}">
                                                 {{ $m->nama_tes }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-sm-4">
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">Kompetensi
                                         Inti</label>
                                     <select name="kompetensi_inti_id" class="form-control"
                                         id="exampleFormControlSelect2">
                                         <option>---</option>
                                         @foreach ($kompetensiinti as $key => $m)
                                             <option value="{{ $m->id }}">
                                                 {{ $m->kompetensi_inti }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-sm-4">
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">KELAS</label>
                                     <select name="kelas_id" class="form-control" id="kelas">
                                         <option hidden>Pilih Kelas</option>
                                         @foreach ($kelas as $key => $m)
                                             <option value="{{ $m->id }}">
                                                 {{ $m->nama }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-sm-4">
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">SISWA</label>
                                     <select name="siswa_id" class="form-control" id="siswa">

                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-4">
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">GURU</label>
                                     <select name="guru_id" class="form-control" id="exampleFormControlSelect2">
                                         <option>---</option>
                                         @foreach ($guru as $key => $m)
                                             <option value="{{ $m->id }}">
                                                 {{ $m->nama_guru }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-sm-4">
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">MAPEL</label>
                                     <select name="mapel_id" class="form-control" id="exampleFormControlSelect2">
                                         <option>---</option>
                                         @foreach ($mapel as $key => $m)
                                             <option value="{{ $m->id }}">
                                                 {{ $m->nama_mapel }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-sm-4">
                                 <div class="form-group {{ $errors->has('nilai') ? ' has-error' : '' }}">
                                     <label for="exampleFormControlInput1">Nilai</label>
                                     <input name="nilai" type="text" class="form-control" id="exampleFormControlInput1"
                                         placeholder="Nilai" value="{{ old('nilai') }}">
                                     @if ($errors->has('nilai'))
                                         <span class="help-block">{{ $errors->first('nilai') }}</span>
                                     @endif
                                 </div>
                                 @if ($errors->has('nilai'))
                                     <span class="help-block">{{ $errors->first('nilai') }}</span>
                                 @endif
                             </div>
                         </div>
                         <div class="form-group {{ $errors->has('nilai_deskripsi') ? ' has-error' : '' }}">
                             <label for="exampleFormControlTextarea1">INDIKATOR KOMPETENSI</label>
                             <textarea name="nilai_deskripsi" class="form-control" id="exampleFormControlTextarea1" placeholder="Pernyataan nilai"
                                 value="{{ old('nilai_deskripsi') }}" rows="3"></textarea>
                         </div>
                         @if ($errors->has('nilai_deskripsi'))
                             <span class="help-block">{{ $errors->first('nilai_deskripsi') }}</span>
                         @endif
                         <div class="form-group {{ $errors->has('nilai_notes') ? ' has-error' : '' }}">
                             <label for="exampleFormControlTextarea1">DESKRIPSI</label>
                             <textarea name="nilai_notes" class="form-control" id="exampleFormControlTextarea1" placeholder="Catatan"
                                 value="{{ old('nilai_notes') }}" rows="3"></textarea>
                         </div>
                         @if ($errors->has('nilai_notes'))
                             <span class="help-block">{{ $errors->first('nilai_notes') }}</span>
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
 @endsection

 @section('footer')
     <script src="{{ asset('/bootstrap3-editable/js/bootstrap-editable.js') }}"></script>
     <!-- ChartJS -->
     <script src="{{ asset('/admin/plugins/chart.js/Chart.min.js') }}"></script>
     <script>
         $(function() {
             /* ChartJS
              * -------
              * Here we will create a few charts using ChartJS
              */

             var areaChartData = {
                 labels: {!! json_encode($categories7) !!},
                 datasets: [{
                     label: 'PH',
                     backgroundColor: 'rgba(60,141,188,0.9)',
                     borderColor: 'rgba(60,141,188,0.8)',
                     pointRadius: false,
                     pointColor: '#3b8bba',
                     pointStrokeColor: 'rgba(60,141,188,1)',
                     pointHighlightFill: '#fff',
                     pointHighlightStroke: 'rgba(60,141,188,1)',
                     data: {!! json_encode($data7) !!}
                 }, ]
             }
             var areaChartData2 = {
                 labels: {!! json_encode($categories8) !!},
                 datasets: [{
                     label: 'PH',
                     backgroundColor: 'rgba(60,141,188,0.9)',
                     borderColor: 'rgba(60,141,188,0.8)',
                     pointRadius: false,
                     pointColor: '#3b8bba',
                     pointStrokeColor: 'rgba(60,141,188,1)',
                     pointHighlightFill: '#fff',
                     pointHighlightStroke: 'rgba(60,141,188,1)',
                     data: {!! json_encode($data8) !!}
                 }, ]
             }
             var areaChartOptions = {
                 maintainAspectRatio: false,
                 responsive: true,
                 legend: {
                     display: false
                 },
                 scales: {
                     xAxes: [{
                         gridLines: {
                             display: false,
                         }
                     }],
                     yAxes: [{
                         gridLines: {
                             display: false,
                         }
                     }]
                 }
             }
             var areaChartOptions2 = {
                 maintainAspectRatio: false,
                 responsive: true,
                 legend: {
                     display: false
                 },
                 scales: {
                     xAxes: [{
                         gridLines: {
                             display: false,
                         }
                     }],
                     yAxes: [{
                         ticks: {
                             beginAtZero: true,
                             callback: function(value) {
                                 if (value % 1 === 0) {
                                     return value;
                                 }
                             }
                         },
                         scaleLabel: {
                             display: false
                         }
                     }]
                 }
             }

             //-------------
             //- BAR CHART -
             //-------------
             var barChartCanvas = $('#barChart').get(0).getContext('2d')
             var barChartCanvas2 = $('#barChart2').get(0).getContext('2d')
             var barChartData = jQuery.extend(true, {}, areaChartData)
             var barChartData2 = jQuery.extend(true, {}, areaChartData2)
             var temp0 = areaChartData.datasets[0]
             var temp1 = areaChartData2.datasets[0]

             barChartData.datasets[0] = temp0
             barChartData2.datasets[0] = temp1

             var barChartOptions = {
                 responsive: true,
                 maintainAspectRatio: false,
                 datasetFill: false
             }

             var barChartOptions2 = {
                 responsive: true,
                 maintainAspectRatio: false,
                 datasetFill: false
             }

             var barChart = new Chart(barChartCanvas, {
                 type: 'bar',
                 data: barChartData,
                 options: barChartOptions
             })
             var barChart2 = new Chart(barChartCanvas2, {
                 type: 'bar',
                 data: barChartData2,
                 options: barChartOptions2
             })
         })
     </script>
     <script type="text/javascript">
         $.fn.editable.defaults.mode = 'inline';
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
             }
         });
         $('.update').editable();
     </script>
 @stop
