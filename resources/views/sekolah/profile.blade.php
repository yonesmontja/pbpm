 @extends('layouts.mailbox')

 @section('title')
     <title> Sekolah </title>
 @endsection
 @section('header')

 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Profile <a href="/sekolah">Sekolah</a></h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                             <li class="breadcrumb-item active">Profile Sekolah</li>
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
                                     <img class="profile-user-img img-fluid img-circle" src="{{ $sekolah->avatar() }}"
                                         alt="User profile picture">
                                 </div>

                                 <h3 class="profile-username text-center"><a href="#">{{ $sekolah->nama }} </a></h3>

                                 <p class="text-muted text-center">{{ $sekolah->kecamatan }}, {{ $sekolah->kota }}</p>

                                 <ul class="list-group list-group-unbordered mb-3">
                                     <li class="list-group-item">
                                         <b>Mapel</b> <a class="float-right">{{ totalMapel() }}</a>
                                     </li>
                                     <li class="list-group-item">
                                         <b>Total Siswa</b> <a class="float-right">{{ totalSiswa() }}</a>
                                     </li>
                                     <li class="list-group-item">
                                         <b>Tahun Pelajaran</b> <a class="float-right">{{ thnPel() }}</a>
                                     </li>
                                 </ul>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->

                         <!-- About Me Box -->
                         <div class="card card-primary">
                             <div class="card-header">
                                 <h3 class="card-title">Data Sekolah</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <strong><i class="fas fa-book mr-1"></i> Kelurahan</strong>

                                 <p class="text-muted">
                                     {{ $sekolah->kelurahan }}
                                 </p>

                                 <hr>

                                 <strong><i class="fas fa-map-marker-alt mr-1"></i> Kecamatan</strong>

                                 <p class="text-muted">{{ $sekolah->kecamatan }}, {{ $sekolah->kota }}</p>

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
                                     <li class="nav-item"><a class="nav-link active" href="#mapel"
                                             data-toggle="tab">Mapel</a></li>

                                     <li class="nav-item"><a class="nav-link" href="#guru"
                                             data-toggle="tab">Guru</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#timeline"
                                             data-toggle="tab">Timeline</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#settings"
                                             data-toggle="tab">Settings</a></li>
                                 </ul>
                             </div><!-- /.card-header -->
                             <div class="card-body">
                                 <div class="tab-content">
                                     <!-- /.tab-pane -->
                                     <div class="active tab-pane" id="mapel">
                                         <div class="card">
                                             <div class="card-header">
                                                 <div class="row">
                                                     <div class="col-md-6">
                                                         <h3 class="card-title">Mapel</h3>
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
                                                 <table id="example3" class="table table-bordered table-hover">
                                                     <thead>
                                                         <tr>
                                                             <th style="width: 10px">Kode Mapel</th>
                                                             <th>Mapel</th>
                                                             <th>Semester</th>
                                                             <th>Guru</th>
                                                             <th>Kelompok</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($mapel as $m)
                                                             <tr>
                                                                 <td><a
                                                                         href="/mapel/{{ $m->id }}">{{ $m->kode }}</a>
                                                                 </td>
                                                                 <td><a
                                                                         href="/mapel/{{ $m->id }}">{{ $m->nama_mapel }}</a>
                                                                 </td>
                                                                 <td>{{ $m->semester }}</td>
                                                                 <td><a
                                                                         href="/guru/{{ $m->guru->id }}/profile">{{ $m->guru->nama_guru }}</a>
                                                                 </td>
                                                                 <td>{{ $m->kelompok }}</td>
                                                             </tr>
                                                         @endforeach
                                                     </tbody>
                                                 </table>
                                             </div>
                                             <!-- /.card-body -->
                                         </div>
                                     </div>
                                     <!-- /.tab-pane -->

                                     <div class="active tab-pane" id="guru">
                                         <div class="card">
                                             <div class="card-header">
                                                 <div class="row">
                                                     <div class="col-md-6">
                                                         <h3 class="card-title">Guru</h3>
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
                                                 <table id="example4" class="table table-bordered table-hover">
                                                     <thead>
                                                         <tr>
                                                             <th style="width: 10px">Kode Guru</th>
                                                             <th>Nama</th>
                                                             <th>Email</th>
                                                             <th>Status</th>
                                                             <th>Foto</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($guru as $g)
                                                             <tr>
                                                                 <td><a
                                                                         href="/guru/{{ $g->id }}/profile">{{ $g->kode_guru }}</a>
                                                                 </td>
                                                                 <td><a
                                                                         href="/guru/{{ $g->id }}/profile">{{ $g->nama_guru }}</a>
                                                                 </td>
                                                                 <td>{{ $g->email }}</td>
                                                                 <td>
                                                                     @if ($g->status == 1)
                                                                         <button href="#" type="button"
                                                                             class="btn btn-success btn-sm"
                                                                             data-toggle="modal"
                                                                             data-target="#modal-dialog">Aktif</button>
                                                                     @endif
                                                                     @if ($g->status == 0)
                                                                         <button href="#" type="button"
                                                                             class="btn btn-danger btn-sm"
                                                                             data-toggle="modal"
                                                                             data-target="#modal-dialog2">Nonaktif</button>
                                                                     @endif
                                                                 </td>
                                                                 <td><img class="profile-user-img img-fluid img-circle"
                                                                         src="{{ $g->avatar() }}"
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
