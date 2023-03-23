 @extends('layouts.mailbox-rombel')

 @section('title')
     <title> SD Dabolding Mapel </title>
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
 @endsection
 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Kelas</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                             <li class="breadcrumb-item active">Kelas</li>
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
                                     <img class="profile-user-img img-fluid img-circle"
                                         src="{{ $rombel4->guru->avatar() }}" alt="User profile picture">
                                 </div>

                                 <h3 class="profile-username text-center"><a href="#">{{ $rombel2 }}</a></h3>

                                 <p class="text-muted text-center">Kelas {{ $rombel3 }}</p>

                                 <ul class="list-group list-group-unbordered mb-3">

                                     <li class="list-group-item">
                                         <b>Wali Kelas </b> <a class="float-right">{{ $rombel4->guru->nama_guru }}</a>
                                     </li>
                                     <li class="list-group-item">
                                         <b>Jumlah Siswa </b> <a class="float-right">{{ $jumlah_siswa }}</a>
                                     </li>
                                 </ul>

                                 <a href="/rombel/{{ $rombel }}/profile" class="btn btn-primary btn-block"><b>Ubah
                                         data
                                         rombel</b></a>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->

                         <!-- About Me Box -->
                         <div class="card card-primary">
                             <div class="card-header">
                                 <h3 class="card-title">Skill Kelas</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <strong><i class="fas fa-book mr-1"></i> Skill-Mapel</strong>
                                 <p class="text-muted">
                                     #
                                 </p>
                                 <hr>
                                 <strong><i class="fas fa-map-marker-alt mr-1"></i> Penilaian Sikap?</strong>
                                 <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                     fermentum enim neque.</p>
                                 <hr>
                                 <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                                 <p class="text-muted">
                                     <span class="tag tag-danger">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                         Etiam
                                         fermentum enim neque.</span>

                                 </p>

                                 <hr>

                                 <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                 <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                     fermentum enim neque.</p>
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
                                     <li class="nav-item"><a class="nav-link active" href="#nilai" data-toggle="tab">Mapel
                                             penilaian</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Nilai
                                             Mingguan</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Nilai
                                             Bulanan</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Jurnal
                                             Penilaian Kelas</a></li>
                                 </ul>
                                 </ul>
                             </div><!-- /.card-header -->
                             <div class="card-body">
                                 <div class="tab-content">
                                     <!-- /.tab-pane -->
                                     <div class="active tab-pane" id="nilai">
                                         <div class="card">
                                             <div class="card-header">
                                                 <div class="row">
                                                     <div class="col-md-6">
                                                         <h3 class="card-title">Mapel penilaian</h3>
                                                     </div>
                                                     <div class="col-md-2 float-right">
                                                         <h3 class="card-title">TA <a
                                                                 href="{{ route('tahunpel.index') }}">{{ thnPel() }}</a>
                                                         </h3>
                                                     </div>

                                                 </div>
                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body">
                                                 <table id="example2" class="table table-bordered table-hover">
                                                     <thead>
                                                         <tr>
                                                             <th style="width: 10px">NIS</th>
                                                             <th>Nama</th>
                                                             <th>Penilaian</th>
                                                             <th>Kelas</th>
                                                             <th>Tanggal</th>
                                                             <th>Nilai</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($nilai as $siswa1)
                                                             <tr>
                                                                 <td><a href="/test/{{ $siswa1->siswa->id }}/profile">{{ $siswa1->siswa->nis }}
                                                                 </td>
                                                                 <td><a href="/test/{{ $siswa1->siswa->id }}/profile">{{ $siswa1->siswa->nama_depan }}
                                                                         {{ $siswa1->siswa->nama_belakang }}
                                                                 </td>
                                                                 <td><a
                                                                         href="/penilaian/{{ $siswa1->penilaian->id }}/profile">{{ $siswa1->penilaian->nama_tes }}
                                                                 </td>
                                                                 <td><a href="/kelas/{{ $siswa1->kelas_id }}/profile">{{ $siswa1->kelas_id }}
                                                                 </td>
                                                                 <td>{{ \Carbon\Carbon::parse($siswa1->tanggal)->format('d M Y') }}</td>
                                                                 <td>{{ $siswa1->nilai }}</td>
                                                             </tr>
                                                         @endforeach
                                                     </tbody>
                                                 </table>
                                             </div>
                                             <!-- /.card-body -->
                                         </div>
                                     </div>
                                     <!-- /.tab-pane -->

                                     <div class="tab-pane" id="activity">

                                         <div class="card">
                                             <div class="card-header border-0">
                                                 <div class="d-flex justify-content-between">
                                                     <h3 class="card-title">Grafik Nilai Rata-rata Kelas Mingguan</h3>
                                                     <a href="/nilai">View Report</a>
                                                 </div>
                                             </div>
                                             <div class="card-body">
                                                 <div class="d-flex">
                                                     <p class="d-flex flex-column">
                                                         <span class="text-bold text-lg">{{ $last0week_average }}</span>
                                                         <span>Nilai Rata-rata Kelas Minggu Ini</span>
                                                     </p>
                                                     <p class="ml-auto d-flex flex-column text-right">
                                                         @if ($last_week_average < 0)
                                                             <span class="text-danger">
                                                                 <i class="fas fa-arrow-down"></i>
                                                                 {{ $last_week_average * -1 }}%
                                                             </span>
                                                         @elseif($last_week_average == 0)
                                                             <span class="text-info">
                                                                 <i class="fas fa-arrow-circle-right"></i>
                                                                 {{ $last_week_average }}%
                                                             </span>
                                                         @elseif ($last_week_average > 0)
                                                             <span class="text-success">
                                                                 <i class="fas fa-arrow-up"></i>
                                                                 {{ $last_week_average }}%
                                                             </span>
                                                         @endif
                                                         <span class="text-muted">Sejak minggu lalu</span>
                                                     </p>
                                                 </div>
                                                 <!-- /.d-flex -->
                                                 <div class="position-relative mb-4">
                                                     <canvas id="sales-chart4"
                                                         style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 757px;"
                                                         width="757" height="250"
                                                         class="chartjs-render-monitor"></canvas>
                                                 </div>
                                                 <div class="d-flex flex-row justify-content-end">
                                                     <span class="mr-2">
                                                         <i class="fas fa-square text-grey"></i> Minggu lalu
                                                     </span>
                                                     <span></span>
                                                     <span class="mr-2">
                                                         <i class="fas fa-square text-primary"></i> Minggu ini
                                                     </span>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- /.card -->
                                     </div>
                                     <!-- /.tab-pane -->
                                     <div class="tab-pane" id="timeline">
                                         <!-- The timeline -->
                                         @foreach ($nilai as $n)
                                             <div class="timeline timeline-inverse">
                                                 <!-- timeline time label -->
                                                 <div class="time-label">
                                                     <span class="bg-danger">
                                                         {{ $n->updated_at->format('d M Y') }}
                                                     </span>
                                                 </div>
                                                 <!-- /.timeline-label -->
                                                 <!-- timeline item -->
                                                 <div>
                                                     <i class="fas fa-envelope bg-primary"></i>
                                                     <div class="timeline-item">
                                                         <span class="time"><i class="far fa-clock"></i>
                                                             {{ $n->updated_at->format('H:i') }}</span>
                                                         <h3 class="timeline-header"><a
                                                                 href="#">{{ $n->guru->nama_guru }}</a> input
                                                             nilai <a
                                                                 href="/mapel/{{ $n->mapel->id }}">{{ $n->mapel->nama_mapel }}</a>
                                                             dari <a
                                                                 href="/test/{{ $siswa1->id }}/profile">{{ $n->siswa->nama_depan }}
                                                                 {{ $n->siswa->nama_belakang }}</a></h3>
                                                         <h3 class="timeline-header">Penilaian dilakukan tanggal: ---</h3>
                                                         <div class="timeline-body">
                                                             <li>Materi: {{ $n->nilai_deskripsi }}</li>
                                                             <li>Indikator: {{ $n->nilai_notes }}</li>
                                                             <li>Nilai: {{ $n->nilai }}</li>
                                                         </div>
                                                         <div class="timeline-footer">
                                                             <a href="#"
                                                                 class="btn btn-primary btn-sm">{{ $n->penilaian->nama_tes }}</a>
                                                             <a href="#"
                                                                 class="btn btn-danger btn-sm">{{ $n->kompetensiinti->kompetensi_inti }}</a>
                                                         </div>

                                                     </div>
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                     <!-- /.tab-pane -->
                                     <div class="tab-pane" id="settings">

                                         <div class="card">
                                             <div class="card-header border-0">
                                                 <div class="d-flex justify-content-between">
                                                     <h3 class="card-title">Grafik Nilai Rata-rata Kelas Bulanan</h3>
                                                     <a href="/nilai">View Report</a>
                                                 </div>
                                             </div>
                                             <div class="card-body">
                                                 <div class="d-flex">
                                                     <p class="d-flex flex-column">
                                                         <span class="text-bold text-lg">{{ $last0month_average }}</span>
                                                         <span>Nilai Rata-rata Kelas Bulan Ini</span>
                                                     </p>
                                                     <p class="ml-auto d-flex flex-column text-right">
                                                         @if ($last_average < 0)
                                                             <span class="text-danger">
                                                                 <i class="fas fa-arrow-down"></i>
                                                                 {{ $last_average * -1 }}%
                                                             </span>
                                                         @elseif($last_average == 0)
                                                             <span class="text-info">
                                                                 <i class="fas fa-arrow-circle-right"></i>
                                                                 {{ $last_average }}%
                                                             </span>
                                                         @elseif ($last_average > 0)
                                                             <span class="text-success">
                                                                 <i class="fas fa-arrow-up"></i>
                                                                 {{ $last_average }}%
                                                             </span>
                                                         @endif
                                                         <span class="text-muted">Sejak bulan lalu</span>
                                                     </p>
                                                 </div>
                                                 <!-- /.d-flex -->
                                                 <div class="position-relative mb-4">
                                                     <canvas id="sales-chart5"
                                                         style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 757px;"
                                                         width="757" height="250"
                                                         class="chartjs-render-monitor"></canvas>
                                                 </div>
                                                 <div class="d-flex flex-row justify-content-end">
                                                     <span class="mr-2">
                                                         <i class="fas fa-square text-grey"></i> Bulan lalu
                                                     </span>
                                                     <span></span>
                                                     <span class="mr-2">
                                                         <i class="fas fa-square text-primary"></i> Bulan ini
                                                     </span>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- /.card -->


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
 @endsection
