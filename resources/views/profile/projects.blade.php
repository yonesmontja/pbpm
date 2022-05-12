 @extends('layouts.mailbox')

 @section('title')
     <title> AdminLTE 3 | Projects </title>
 @endsection

 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Projects Siswa</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="/tdu">Home</a></li>
                             <li class="breadcrumb-item active">Projects Siswa</li>
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
                     <h3 class="card-title">Projects Siswa</h3>
                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                             title="Collapse">
                             <i class="fas fa-minus"></i></button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                             title="Remove">
                             <i class="fas fa-times"></i></button>
                     </div>
                 </div>
                 <div class="card-header">
                     <a class="btn btn-primary btn-sm" href="/projects-add" method="POST" enctype="multipart/form-data">
                         <i class="fas fa-folder">
                         </i>
                         Tambah Project Siswa
                     </a>
                 </div>
                 <div class="card-body p-0">
                     <table id="example2" class="table table-striped projects">
                         <thead>
                             <tr>
                                 <th style="width: 1%">
                                     #
                                 </th>
                                 <th style="width: 20%">
                                     Nama Project
                                 </th>
                                 <th style="width: 4%"></th>
                                 <th style="width: 30%">
                                     Siswa
                                 </th>
                                 <th>
                                     Progress
                                 </th>
                                 <th style="width: 8%" class="text-center">
                                     Status
                                 </th>
                                 <th style="width: 20%">
                                 </th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($project as $p => $r)
                                 <tr>
                                     <td>
                                         {{ $p + 1 }}
                                     </td>
                                     <td>
                                         <a>
                                             {{ $r->nama }}
                                         </a>
                                         <br />
                                         <small>
                                             {{ $r->created_at }}
                                         </small>
                                     </td>
                                     <td>
                                         @foreach ($psd as $s => $t)
                                             @if ($r->siswa->id == $t)
                                                 <ul class="list-inline">
                                                     <li class="list-inline-item">
                                                         <img alt="Avatar" class="table-avatar"
                                                             src="{{ $r->siswa->avatar() }}">
                                                     </li>
                                                 </ul>
                                             @endif
                                         @endforeach
                                     </td>
                                     <td>
                                         @foreach ($psd as $s => $t)
                                             @if ($r->siswa->id == $t)
                                                 <ul class="list-inline">
                                                     <li class="list-inline-item">
                                                         <a
                                                             href="/test/{{ $r->siswa->id }}/profile">{{ $r->siswa->nama_depan }}</a>
                                                     </li>
                                                 </ul>
                                             @endif
                                         @endforeach
                                     </td>
                                     <td class="project_progress">
                                         <div class="progress progress-sm">
                                             <div class="progress-bar bg-green" role="progressbar"
                                                 aria-volumenow="{{ $r->progress }}" aria-volumemin="0"
                                                 aria-volumemax="100" style="width: {{ $r->progress }}%">
                                             </div>
                                         </div>
                                         <small>
                                             {{ $r->progress }}% Tuntas
                                         </small>
                                     </td>
                                     <td class="project-state">
                                         @if ($r->status == 1)
                                             <span class="badge badge-success">Berhasil</span>
                                         @endif
                                         @if ($r->status >= 0 && $r->status < 1)
                                             <span class="badge badge-warning">Belum selesai</span>
                                         @endif
                                         @if ($r->status == 0)
                                             <span class="badge badge-danger">Gagal</span>
                                         @endif
                                     </td>
                                     <td class="project-actions text-right">
                                         <a class="btn btn-primary btn-sm" href="/projects/{{ $r->id }}/detail">
                                             <i class="fas fa-folder">
                                             </i>
                                             Lihat
                                         </a>
                                         <a class="btn btn-info btn-sm" href="/projects-edit">
                                             <i class="fas fa-pencil-alt">
                                             </i>
                                             Edit
                                         </a>
                                         <a class="btn btn-danger btn-sm" href="/projects-delete">
                                             <i class="fas fa-trash">
                                             </i>
                                             Hapus
                                         </a>
                                     </td>
                                 </tr>
                             @endforeach

                         </tbody>
                     </table>
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->

         </section>
         <!-- /.content -->
     </div>
 @endsection
