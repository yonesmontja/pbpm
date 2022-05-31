 @extends('layouts.mailbox')

 @section('title')
     <title> SD Dabolding Buat Projects </title>
 @endsection

 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Buat Project</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="/tdu">Home</a></li>
                             <li class="breadcrumb-item active">Buat Project</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
             <form action="/projects-create" method="POST" enctype="multipart/form-data">
                 {{ csrf_field() }}
                 <div class="row">
                     <div class="col-md-6">
                         <div class="card card-primary">
                             <div class="card-header">
                                 <h3 class="card-title">Isian Project Siswa</h3>
                                 <div class="card-tools">
                                     <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                         data-toggle="tooltip" title="Collapse">
                                         <i class="fas fa-minus"></i></button>
                                 </div>
                             </div>
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-sm-4">
                                         <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                                             <label for="exampleFormControlInput1">Nama Proyek</label>
                                             <input name="nama" type="text" class="form-control"
                                                 id="exampleFormControlInput1" placeholder="Masukkan nama proyek"
                                                 value="{{ old('nama') }}">
                                             @if ($errors->has('nama'))
                                                 <span class="help-block">{{ $errors->first('nama') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-sm-4">
                                         <div class="form-group {{ $errors->has('progress') ? ' has-error' : '' }}">
                                             <label for="exampleFormControlInput1">Progress Proyek</label>
                                             <input name="progress" type="text" class="form-control"
                                                 id="exampleFormControlInput1" placeholder="Masukkan progress proyek"
                                                 value="{{ old('progress') }}">
                                             @if ($errors->has('progress'))
                                                 <span class="help-block">{{ $errors->first('progress') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-sm-4">
                                         <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                             <label for="exampleFormControlSelect1">Status?</label>
                                             <select name="status" class="form-control" id="exampleFormControlSelect2">
                                                 <option>---</option>
                                                 <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                                     Gagal</option>
                                                 <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>
                                                     Sedang berlangsung</option>
                                                 <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>
                                                     Sukses</option>
                                             </select>
                                             @if ($errors->has('status'))
                                                 <span class="help-block">{{ $errors->first('status') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-sm-4">
                                         <!-- Date -->
                                         <div class="form-group" {{ $errors->has('tanggal') ? ' has-error' : '' }}">
                                             <label>Tanggal:</label>
                                             <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                 <input name="tanggal" type="text" class="form-control datetimepicker-input"
                                                     data-target="#reservationdate" value="{{ old('tanggal') }}" />
                                                 @if ($errors->has('tanggal'))
                                                     <span class="help-block">{{ $errors->first('tanggal') }}</span>
                                                 @endif
                                                 <div class="input-group-append" data-target="#reservationdate"
                                                     data-toggle="datetimepicker">
                                                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                 </div>
                                             </div>
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
                                 <div class="col-sm-10">
                                     <div class="form-group">
                                         <label for="exampleFormControlTextarea1">Deskripsi Singkat Proyek</label>
                                         <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                     </div>
                                 </div>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                     <div class="col-md-6">
                         <div class="card card-secondary">
                             <div class="card-header">
                                 <h3 class="card-title">Isian Project Siswa</h3>

                                 <div class="card-tools">
                                     <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                         data-toggle="tooltip" title="Collapse">
                                         <i class="fas fa-minus"></i></button>
                                 </div>
                             </div>
                             <div class="card-body">
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">MAPEL</label>
                                     <select name="mapel_id" class="form-control" id="mapel">
                                         <option hidden>Pilih mapel</option>
                                         @foreach ($mapel as $key => $m)
                                             <option value="{{ $m->id }}">
                                                 {{ $m->nama_mapel }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">GURU</label>
                                     <select name="guru_id" class="form-control" id="guru">
                                         <option hidden>Pilih guru</option>
                                         @foreach ($guru as $key => $m)
                                             <option value="{{ $m->id }}">
                                                 {{ $m->nama_guru }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">PENILAIAN</label>
                                     <select name="penilaian_id" class="form-control" id="penilaian">
                                         <option hidden>Pilih penilaian</option>
                                         @foreach ($penilaian as $key => $m)
                                             <option value="{{ $m->id }}">
                                                 {{ $m->nama_tes }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleFormControlSelect1">KOMPETENSI INTI</label>
                                     <select name="kompetensiinti_id" class="form-control" id="kompetensiinti">
                                         <option hidden>Pilih kompetensi inti</option>
                                         @foreach ($kompetensiinti as $key => $m)
                                             <option value="{{ $m->id }}">
                                                 {{ $m->kompetensi_inti }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-12">
                         <a href="#" class="btn btn-secondary">Batal</a>
                         <input type="submit" value="Buat Proyek Baru" class="btn btn-success float-right">
                     </div>
                 </div>
             </form>
         </section>
         <!-- /.content -->
     </div>
 @endsection
