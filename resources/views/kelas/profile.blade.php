 @extends('layouts.mailbox')

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
                             <li class="breadcrumb-item active">Profile Kelas</li>
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
                                     <img class="profile-user-img img-fluid img-circle" src="{{ $kelas->avatar() }}"
                                         alt="User profile picture">
                                 </div>

                                 <h3 class="profile-username text-center"><a href="#">{{ $kelas->kelas }} </a></h3>

                                 <p class="text-muted text-center">{{ $kelas->nama }}</p>

                                 <ul class="list-group list-group-unbordered mb-3">
                                     <li class="list-group-item">
                                         <b>Jumlah siswa</b> <a class="float-right">{{ $jumlah_siswa }}</a>
                                     </li>
                                     <li class="list-group-item">
                                         <b>Wali Kelas</b> <a class="float-right">{{ $wali_kelas }}</a>
                                     </li>
                                     <li class="list-group-item">
                                         <b>Nilai Rata-rata Kelas</b> <a class="float-right">{{ $rata_kelas }}</a>
                                     </li>
                                 </ul>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->

                         <!-- About Me Box -->
                         <div class="card card-primary">
                             <div class="card-header">
                                 <h3 class="card-title">Peta Materi</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <strong><i class="fas fa-book mr-1"></i> Capaian</strong>

                                 <p class="text-muted">
                                     Capaian kelas
                                 </p>

                                 <hr>

                                 <strong><i class="fas fa-map-marker-alt mr-1"></i> Konsep PBPM</strong>

                                 <p class="text-muted">Expert Kampung</p>

                                 <hr>

                                 <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                 <p class="text-muted">
                                     <span class="tag tag-danger">Peta Aset</span>
                                     <span class="tag tag-success">Keluarga</span>
                                     <span class="tag tag-info">Kampung</span>
                                     <span class="tag tag-warning">Aset Alam</span>
                                     <span class="tag tag-primary">Budaya</span>
                                 </p>

                                 <hr>

                                 <strong><i class="far fa-file-alt mr-1"></i> SKL</strong>

                                 <p class="text-muted">Mampu berimajinasi tentang Kampungnya.</p>
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
                                             data-toggle="tab">Kelas</a></li>

                                     <li class="nav-item"><a class="nav-link" href="#activity"
                                             data-toggle="tab">Aktivitas</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#timeline"
                                             data-toggle="tab">Timeline</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#settings"
                                             data-toggle="tab">Settings</a></li>
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
                                                         <h3 class="card-title">Kelas</h3>
                                                     </div>
                                                     <div class="col-md-2 float-right">
                                                         <h3 class="card-title">TA <a
                                                                 href="{{ route('tahunpel.index') }}">{{ thnPel() }}</a>
                                                         </h3>
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
                                             <div class="card-body">
                                                 <table id="example2" class="table table-bordered table-hover">
                                                     <thead>
                                                         <tr>
                                                             <th style="width: 10px">Nama</th>
                                                             <th>ID siswa</th>
                                                             <th>Penilaian</th>
                                                             <th>Mapel</th>
                                                             <th style="width: 80px">Nilai Siswa</th>
                                                             <th>Avatar</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($nilai_rata_siswa as $k => $ns)
                                                             <tr>
                                                                 <td>
                                                                     <a href="/test/{{ $ns->siswa_id }}/profile">{{ $ns->siswa->nama_depan }}
                                                                         {{ $ns->siswa->nama_belakang }}</a>
                                                                 </td>
                                                                 <td><a href="/test/{{ $ns->siswa_id }}/profile">{{ $ns->siswa_id }}
                                                                 </td>
                                                                 <td><a
                                                                         href="/penilaian/{{ $ns->penilaian->id }}/profile">{{ $ns->penilaian->nama_tes }}
                                                                 </td>
                                                                 <td><a href="/mapel/{{ $ns->mapel->id }}">{{ $ns->mapel->nama_mapel }}
                                                                 </td>
                                                                 <td>{{ $ns->nilai }}</td>
                                                                 <td><img class="profile-user-img img-fluid img-circle"
                                                                         src="{{ $ns->siswa->avatar() }}"
                                                                         alt="User profile picture"></td>
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
                                         <div class="row">
                                             <div class="col-sm-12">
                                                 <div class="card">
                                                     <div class="card-header border-0">
                                                         <div class="d-flex justify-content-between">
                                                             <h3 class="card-title">Grafik 2</h3>
                                                             <a href="/nilai">View Report</a>
                                                         </div>
                                                     </div>
                                                     <div class="card-body">
                                                         <div class="d-flex">
                                                             <p class="d-flex flex-column">
                                                                 <span
                                                                     class="text-bold text-lg">{{ $last0week_average }}</span>
                                                                 <span>Nilai Rata-rata</span>
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
                                                             <canvas id="sales-chart2" height="200"></canvas>
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
                                         </div>

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
                                                         <img src="http://placehold.it/150x100" alt="...">
                                                         <img src="http://placehold.it/150x100" alt="...">
                                                         <img src="http://placehold.it/150x100" alt="...">
                                                         <img src="http://placehold.it/150x100" alt="...">
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
                                         <form class="form-horizontal">
                                             <div class="form-group row">
                                                 <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                 <div class="col-sm-10">
                                                     <input type="email" class="form-control" id="inputName"
                                                         placeholder="Name">
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                 <div class="col-sm-10">
                                                     <input type="email" class="form-control" id="inputEmail"
                                                         placeholder="Email">
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                 <div class="col-sm-10">
                                                     <input type="text" class="form-control" id="inputName2"
                                                         placeholder="Name">
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputExperience"
                                                     class="col-sm-2 col-form-label">Experience</label>
                                                 <div class="col-sm-10">
                                                     <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                                 <div class="col-sm-10">
                                                     <input type="text" class="form-control" id="inputSkills"
                                                         placeholder="Skills">
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <div class="offset-sm-2 col-sm-10">
                                                     <div class="checkbox">
                                                         <label>
                                                             <input type="checkbox"> I agree to the <a href="#">terms and
                                                                 conditions</a>
                                                         </label>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <div class="offset-sm-2 col-sm-10">
                                                     <button type="submit" class="btn btn-danger">Submit</button>
                                                 </div>
                                             </div>
                                         </form>
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
 @section('footer')
     <script src="{{ asset('/admin/plugins/chart.js/Chart.min.js') }}"></script>
     <script>
         $(function() {
             /*
              * LINE CHART
              * ----------
              */
             var $salesChart = $('#sales-chart2')
             var salesChart = new Chart($salesChart, {
                 type: 'bar',
                 data: {
                     labels: {!! json_encode($penilaian_list) !!},
                     datasets: [{
                             backgroundColor: '#252626',
                             borderColor: '#252626',
                             data: {!! json_encode($penilaian_last_week) !!}
                         },
                         {
                             backgroundColor: '#007bff',
                             borderColor: '#007bff',
                             data: {!! json_encode($penilaian_this_week) !!}
                         }
                     ]
                 },
                 options: {
                     maintainAspectRatio: false,
                     tooltips: {
                         mode: mode,
                         intersect: intersect
                     },
                     hover: {
                         mode: mode,
                         intersect: intersect
                     },
                     legend: {
                         display: false
                     },
                     scales: {
                         yAxes: [{
                             display: true,
                             gridLines: {
                                 display: true,
                                 lineWidth: '4px',
                                 color: 'rgba(0, 0, 0, .2)',
                                 zeroLineColor: 'transparent'
                             },
                             ticks: $.extend({
                                 beginAtZero: true,
                                 suggestedMax: 100,
                             }, ticksStyle)
                         }],
                         xAxes: [{
                             display: true,
                             gridLines: {
                                 display: false
                             },
                             ticks: ticksStyle
                         }]
                     }
                 }
             });
            })
     </script>
 @endsection
