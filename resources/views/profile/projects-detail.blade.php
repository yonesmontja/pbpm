 @extends('layouts.mailbox')

 @section('title')
     <title> AdminLTE 3 | Projects Detail </title>
 @endsection

 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>{{ $project->nama }}</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="/tdu">Home</a></li>
                             <li class="breadcrumb-item active">Rincian Proyek</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">

             <!-- Default box -->
             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title">Rincian Proyek</h3>

                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                             title="Collapse">
                             <i class="fas fa-minus"></i></button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                             title="Remove">
                             <i class="fas fa-times"></i></button>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                             <div class="row">
                                 <div class="col-12 col-sm-4">
                                     <div class="info-box bg-light">
                                         <div class="info-box-content">
                                             <span class="info-box-text text-center text-muted">Kompetensi Inti</span>
                                             <span
                                                 class="info-box-number text-center text-muted mb-0">{{ $project->kompetensiinti->kompetensi_inti }}</span>
                                             <span class="info-box-text text-center text-muted mb-0">Domain:
                                                 {{ $project->kompetensiinti->ki_domain }}</span>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-12 col-sm-4">
                                     <div class="info-box bg-light">
                                         <div class="info-box-content">
                                             <span class="info-box-text text-center text-muted">Kelas</span>
                                             <span
                                                 class="info-box-number text-center text-muted mb-0">{{ $project->kelas->nama }}</span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-12 col-sm-4">
                                     <div class="info-box bg-light">
                                         <div class="info-box-content">
                                             <span class="info-box-text text-center text-muted">Mata Pelajaran</span>
                                             <span
                                                 class="info-box-number text-center text-muted mb-0">{{ $project->mapel->nama_mapel }}</span>
                                             <span class="info-box-text text-center text-muted">Semester:
                                                 {{ $project->mapel->semester }} </span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-12">
                                     <h4>Aktivitas Terkini</h4>
                                     @foreach ($siswa as $key => $p)
                                         <div class="post">
                                             <div class="user-block">
                                                 <img class="img-circle img-bordered-sm" src="{{ $p->avatar() }}"
                                                     alt="user image">
                                                 <span class="username">
                                                     <a href="/test/{{ $p->id }}/profile">{{ $p->nama_depan }}</a>
                                                 </span>
                                                 <span class="description">Shared publicly -
                                                     {{ $project->created_at }} hari ini</span>
                                             </div>
                                             <!-- /.user-block -->
                                             <p>
                                                 Input data proyek yang pertama.
                                             </p>
                                             <p>
                                                 <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>
                                                     Demo
                                                     File 1 v2</a>
                                             </p>
                                         </div>
                                         <div class="post clearfix">
                                             <div class="user-block">
                                                 <img class="img-circle img-bordered-sm" src="{{ $p->avatar() }}"
                                                     alt="User Image">
                                                 <span class="username">
                                                     <a
                                                         href="/test/{{ $p->id }}/profile">{{ $p->nama_depan }}</a>
                                                 </span>
                                                 <span class="description">Mengirimkan hasil proyek siswa</span>
                                             </div>
                                             <!-- /.user-block -->
                                             <p>
                                                 Setelah menyelesaikan pengkajian, siswa mengumpulkan hasil proyek ke
                                                 guru mata pelajaran.
                                             </p>
                                             <p>
                                                 <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>
                                                     Demo
                                                     File 2</a>
                                             </p>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                             <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $project->nama }}</h3>
                             <p class="text-muted">Menjelaskan aset Kampung.</p>
                             <br>
                             <div class="text-muted">
                                 <p class="text-sm">Kelas
                                     <b class="d-block"><a href="/kelas/{{ $project->kelas->id }}/profile">{{ $project->kelas->nama }}</a></b>
                                 </p>
                                 <p class="text-sm">Guru
                                     <b class="d-block"><a
                                             href="/guru/{{ $guru[0]->id }}/profile">{{ $guru[0]->nama_guru }}</a></b>
                                 </p>
                             </div>

                             <h5 class="mt-5 text-muted">Project files</h5>
                             <ul class="list-unstyled">
                                 <li>
                                     <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>
                                         Daftar Nilai.docx</a>
                                 </li>
                                 <li>
                                     <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                                         Jurnal Siswa.pdf</a>
                                 </li>
                                 <li>
                                     <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>
                                         Absensi.mln</a>
                                 </li>
                                 <li>
                                     <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i>
                                         GambarProyek.png</a>
                                 </li>
                                 <li>
                                     <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>
                                         LaporanProyek.docx</a>
                                 </li>
                             </ul>
                             <div class="text-center mt-5 mb-3">
                                 <a href="#" class="btn btn-sm btn-primary">Tambah File</a>
                                 <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                             </div>
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
