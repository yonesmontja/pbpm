 @extends('layouts.mailbox-penilaian')

 @section('title')
     <title> AdminLTE 3 | Compose </title>
 @endsection
 @section('header')

 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Profile</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                             <li class="breadcrumb-item active">Profile Penilaian</li>
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
                                     <img class="profile-user-img img-fluid img-circle" src="{{ $penilaian1->avatar() }}"
                                         alt="User profile picture">
                                 </div>

                                 <h3 class="profile-username text-center"><a href="#">{{ $penilaian1->nama_tes }} </a></h3>

                                 <p class="text-muted text-center">Penilaian</p>

                                 <ul class="list-group list-group-unbordered mb-3">
                                     <li class="list-group-item">
                                         <b>Jumlah siswa</b> <a class="float-right">{{ $jml_siswa_penilaian }}</a>
                                     </li>
                                     <li class="list-group-item">
                                         <b>Jumlah kelas</b> <a class="float-right">{{ $jml_kelas_penilaian }}</a>
                                     </li>
                                     <li class="list-group-item">
                                         <b>Jumlah mapel</b> <a class="float-right">{{ $jml_mapel_penilaian }}</a>
                                     </li>
                                 </ul>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->

                         <!-- About Me Box -->
                         <div class="card card-primary">
                             <div class="card-header">
                                 <h3 class="card-title">Info Detail</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                 <p class="text-muted">
                                     B.S. in Computer Science from the University of Tennessee at Knoxville
                                 </p>

                                 <hr>

                                 <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                 <p class="text-muted">Malibu, California</p>

                                 <hr>

                                 <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                 <p class="text-muted">
                                     <span class="tag tag-danger">UI Design</span>
                                     <span class="tag tag-success">Coding</span>
                                     <span class="tag tag-info">Javascript</span>
                                     <span class="tag tag-warning">PHP</span>
                                     <span class="tag tag-primary">Node.js</span>
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
                                     <li class="nav-item"><a class="nav-link active" href="#nilai"
                                             data-toggle="tab">Mapel penilaian</a></li>

                                     <li class="nav-item"><a class="nav-link" href="#activity"
                                             data-toggle="tab">Nilai Mingguan</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#timeline"
                                             data-toggle="tab">Timeline</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#settings"
                                             data-toggle="tab">Nilai Bulanan</a></li>
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
                                                             <th>Mapel</th>
                                                             <th>Kelas</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($nilai as $siswa1)
                                                             <tr>
                                                                 <td><a href="/test/{{ $siswa1->siswa->id }}/profile">{{ $siswa1->siswa->nis }}</td>
                                                                 <td><a href="/test/{{ $siswa1->siswa->id }}/profile">{{ $siswa1->siswa->nama_depan }} {{ $siswa1->siswa->nama_belakang }}
                                                                 </td>
                                                                 <td><a href="/mapel/{{ $siswa1->mapel->id }}">{{ $siswa1->mapel->nama_mapel }}</td>
                                                                 <td><a href="/kelas/{{ $siswa1->kelas_id }}/profile">{{ $siswa1->kelas_id }}</td>
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
                                                         width="757" height="250" class="chartjs-render-monitor"></canvas>
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
                                         <div class="timeline timeline-inverse">
                                             <!-- timeline time label -->
                                             <div class="time-label">
                                                 <span class="bg-danger">
                                                     10 Feb. 2014
                                                 </span>
                                             </div>
                                             <!-- /.timeline-label -->
                                             <!-- timeline item -->
                                             <div>
                                                 <i class="fas fa-envelope bg-primary"></i>

                                                 <div class="timeline-item">
                                                     <span class="time"><i class="far fa-clock"></i>
                                                         12:05</span>

                                                     <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                         email</h3>

                                                     <div class="timeline-body">
                                                         Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                         weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                         jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                         quora plaxo ideeli hulu weebly balihoo...
                                                     </div>
                                                     <div class="timeline-footer">
                                                         <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                         <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- END timeline item -->
                                             <!-- timeline item -->
                                             <div>
                                                 <i class="fas fa-user bg-info"></i>

                                                 <div class="timeline-item">
                                                     <span class="time"><i class="far fa-clock"></i> 5 mins
                                                         ago</span>

                                                     <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                         accepted your friend request
                                                     </h3>
                                                 </div>
                                             </div>
                                             <!-- END timeline item -->
                                             <!-- timeline item -->
                                             <div>
                                                 <i class="fas fa-comments bg-warning"></i>

                                                 <div class="timeline-item">
                                                     <span class="time"><i class="far fa-clock"></i> 27 mins
                                                         ago</span>

                                                     <h3 class="timeline-header"><a href="#">Jay White</a> commented on
                                                         your post</h3>

                                                     <div class="timeline-body">
                                                         Take me to your leader!
                                                         Switzerland is small and neutral!
                                                         We are more like Germany, ambitious and misunderstood!
                                                     </div>
                                                     <div class="timeline-footer">
                                                         <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                             comment</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- END timeline item -->
                                             <!-- timeline time label -->
                                             <div class="time-label">
                                                 <span class="bg-success">
                                                     3 Jan. 2014
                                                 </span>
                                             </div>
                                             <!-- /.timeline-label -->
                                             <!-- timeline item -->
                                             <div>
                                                 <i class="fas fa-camera bg-purple"></i>

                                                 <div class="timeline-item">
                                                     <span class="time"><i class="far fa-clock"></i> 2 days
                                                         ago</span>

                                                     <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new
                                                         photos</h3>

                                                     <div class="timeline-body">
                                                         <img src="{{ asset('/images/admin-2.jpg') }}" alt="...">
                                                         <img src="{{ asset('/images/admin-2.jpg') }}" alt="...">
                                                         <img src="{{ asset('/images/admin-2.jpg') }}" alt="...">
                                                         <img src="{{ asset('/images/admin-2.jpg') }}" alt="...">
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- END timeline item -->
                                             <div>
                                                 <i class="far fa-clock bg-gray"></i>
                                             </div>
                                         </div>
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
                                                         width="757" height="250" class="chartjs-render-monitor"></canvas>
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
