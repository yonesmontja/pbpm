 @extends('layouts.mailbox')

 @section('title')
     <title> SD Dabolding Portofolio </title>
 @endsection

 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         @if (auth()->user()->role == 'guru')
                             <h1>Dashboard Guru</h1>
                         @else
                             <h1>Dashboard</h1>
                         @endif
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="/tdu">Home</a></li>
                             @if (auth()->user()->role == 'guru')
                                 <li class="breadcrumb-item active">Dashboard Guru</li>
                             @else
                                 <li class="breadcrumb-item active">Dashboard</li>
                             @endif
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>
         <!-- Main content -->
         <section class="content">
             <!-- Default box -->
             <div class="card card-solid">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-12 col-sm-6 col-md-4">
                             <div class="info-box">
                                 <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                                 <div class="info-box-content">
                                     <span class="info-box-text"><a href="#">{{ $nama_rombel }}</a></span>
                                     <span class="info-box-number">
                                         {{ totalKelas1A() }}
                                         <small> siswa</small>
                                     </span>
                                 </div>
                                 <!-- /.info-box-content -->
                             </div>
                             <!-- /.info-box -->
                         </div>
                         <div class="col-12 col-sm-6 col-md-4">
                             <div class="info-box">
                                 <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                                 <div class="info-box-content">
                                     <span class="info-box-text"><a href="#">Perempuan</a></span>
                                     <span class="info-box-number">
                                         {{ count($tampung_female) }}
                                         <small> siswa</small>
                                     </span>
                                 </div>
                                 <!-- /.info-box-content -->
                             </div>
                             <!-- /.info-box -->
                         </div>
                         <div class="col-12 col-sm-6 col-md-4">
                             <div class="info-box">
                                 <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                                 <div class="info-box-content">
                                     <span class="info-box-text"><a href="#">Laki-laki</a></span>
                                     <span class="info-box-number">
                                         {{ count($tampung_male) }}
                                         <small> siswa</small>
                                     </span>
                                 </div>
                                 <!-- /.info-box-content -->
                             </div>
                             <!-- /.info-box -->
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12 col-sm-6 col-md-4">
                             <div class="info-box">
                                 <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                                 <div class="info-box-content">
                                     <span class="info-box-text"><a href="#">Islam</a></span>
                                     <span class="info-box-number">
                                         {{ count($tampung_islam) }}
                                         <small> siswa</small>
                                     </span>
                                 </div>
                                 <!-- /.info-box-content -->
                             </div>
                             <!-- /.info-box -->
                         </div>
                         <div class="col-12 col-sm-6 col-md-4">
                             <div class="info-box">
                                 <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                                 <div class="info-box-content">
                                     <span class="info-box-text"><a href="#">Katolik</a></span>
                                     <span class="info-box-number">
                                         {{ count($tampung_katolik) }}
                                         <small> siswa</small>
                                     </span>
                                 </div>
                                 <!-- /.info-box-content -->
                             </div>
                             <!-- /.info-box -->
                         </div>
                         <div class="col-12 col-sm-6 col-md-4">
                             <div class="info-box">
                                 <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                                 <div class="info-box-content">
                                     <span class="info-box-text"><a href="#">Kristen Protestan</a></span>
                                     <span class="info-box-number">
                                         {{ count($tampung_protestan) }}
                                         <small> siswa</small>
                                     </span>
                                 </div>
                                 <!-- /.info-box-content -->
                             </div>
                             <!-- /.info-box -->
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-sm-4">
                             <!-- Profile Image -->
                             <div class="card card-primary card-outline">
                                 <div class="card-body box-profile">
                                     <div class="text-center">
                                         <img class="profile-user-img img-fluid img-circle"
                                             src="{{ auth()->user()->avatar() }}" alt="User profile picture">
                                     </div>
                                     @if (auth()->user()->role == 'guru')
                                         <h3 class="profile-username text-center"><a href="#">{{ $nama_guru }}
                                             </a></h3>
                                         <h5 class="text-center"><a href="/isinilai/{{ $guru }}"
                                                 class="btn btn-primary btn-lg btn-flat">
                                                 Isi Nilai
                                             </a></h5>
                                     @endif
                                 </div>
                                 <!-- /.card-body -->
                             </div>
                             <!-- /.card -->
                             <hr>
                         </div>
                     </div>
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </section>
         <!-- /.content -->
     </div>
 @endsection
