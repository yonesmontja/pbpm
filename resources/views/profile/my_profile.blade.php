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
@endsection
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
                            @if (auth()->user()->role == 'admin')
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            @elseif (auth()->user()->role == 'guru')
                                <li class="breadcrumb-item"><a href="/dashboard_guru">Home</a></li>
                            @endif
                            <li class="breadcrumb-item active">User Profile</li>
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
                                    <img class="profile-user-img img-fluid img-circle" src="{{ $user->avatar() }}"
                                        alt="User profile picture">
                                </div>
                                @if ($user->role == 'admin')
                                    <h3 class="profile-username text-center"><a
                                            href="/user/{{ $user->id }}/profile">{{ $user->name }} </a></h3>
                                @elseif ($user->role == 'guru')
                                    <h3 class="profile-username text-center"><a
                                            href="/guru/{{ $guru }}/profile">{{ $nama_guru }} </a></h3>
                                @else
                                    <h3 class="profile-username text-center"><a
                                            href="#">{{ $user->siswa->nama_depan }}
                                            {{ $user->siswa->nama_belakang }}</a></h3>
                                @endif

                                <p class="text-muted text-center">{{ $user->name }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        @if ($user->role == 'admin' || $user->role == 'guru')
                                            <b>Role</b> <a class="float-right">{{ $user->role }}</a>
                                        @else
                                            <b>Kelas</b> <a class="float-right">{{ $user->siswa->kelas }}</a>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        @if ($user->role == 'admin' || $user->role == 'guru')
                                            ---
                                        @else
                                            <b>Jenis Kelamin</b> <a
                                                class="float-right">{{ $user->siswa->jenis_kelamin }}</a>
                                        @endif
                                    </li>
                                </ul>

                                <a href="/user/{{ $user->id }}/edit" class="btn btn-primary btn-block"><b>Ubah
                                        Profil</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                @if ($user->role == 'guru')
                                    <h3 class="card-title">Data Diri</h3>
                                @else
                                    <h3 class="card-title">Data Diri Siswa</h3>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Tempat Lahir</strong>

                                @if ($user->role == 'admin' || $user->role == 'guru')
                                    ---
                                @else
                                    <p class="text-muted">
                                        {{ $user->siswa->tempat_lahir }}
                                    </p>
                                @endif

                                <hr>

                                @if ($user->role == 'admin' || $user->role == 'guru')
                                    ---
                                @else
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Tanggal Lahir</strong>

                                    <p class="text-muted">{{ $user->siswa->tgl_lahir }}</p>
                                @endif

                                <hr>

                                @if ($user->role == 'admin' || $user->role == 'guru')
                                @else
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Agama</strong>

                                    <p class="text-muted">{{ $user->siswa->agama }}</p>
                                @endif

                                <hr>

                                @if ($user->role == 'admin' || $user->role == 'guru')
                                @else
                                    <strong><i class="far fa-file-alt mr-1"></i> Alamat</strong>

                                    <p class="text-muted">{{ $user->siswa->alamat }}</p>
                                @endif
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
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Jurnal Penilaian</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Linimasa Penilaian</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- /.tab-pane -->

                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="activity">
                                        <!-- Post -->
                                        @foreach ($nilai as $n)
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{ $n->guru->avatar() }}" alt="user image">
                                                    <span class="username">
                                                        <a href="#">{{ $n->guru->nama_guru }}</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Melakukan penilaian -
                                                        {{ \Carbon\Carbon::parse($n->tanggal)->diffForHumans() }}</span>
                                                </div>
                                                <!-- /.user-block -->
                                                <p>
                                                    <li>Materi: {{ $n->nilai_deskripsi }}</li>
                                                    <li>Indikator: {{ $n->nilai_notes }}</li>
                                                </p>
                                                <p>
                                                    <a href="#" class="link-black text-sm mr-2"><i
                                                            class="fas fa-share mr-1"></i> Siswa:
                                                        {{ $n->siswa->nama_depan }}
                                                        {{ $n->siswa->nama_belakang }}</a>
                                                    <a href="#" class="link-black text-sm"><i
                                                            class="far fa-thumbs-up mr-1"></i> Mapel:
                                                        {{ $n->mapel->nama_mapel }}</a>
                                                    <span class="float-right">
                                                        <a href="#" class="link-black text-sm">
                                                            <i class="far fa-comments mr-1"></i> Nilai: {{ $n->nilai }}
                                                        </a>
                                                    </span>
                                                </p>
                                            </div>
                                        @endforeach
                                        <!-- /.post -->
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
                                                                 href="{{ $n->mapel->id }}">{{ $n->mapel->nama_mapel }}</a>
                                                             dari <a
                                                                 href="/test/{{ $n->siswa->id }}/profile">{{ $n->siswa->nama_depan }}
                                                                 {{ $n->siswa->nama_belakang }}</a></h3>
                                                         <h3 class="timeline-header"><a href="#">Penilaian dilakukan
                                                                 tanggal:
                                                             </a>{{ \Carbon\Carbon::parse($n->tanggal)->diffForHumans() }}
                                                         </h3>
                                                         <div class="timeline-body">
                                                             <li>Materi: {{ $n->nilai_deskripsi }}</li>
                                                             <li>Indikator: {{ $n->nilai_notes }}</li>
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
