@extends('layouts.master5')

@section('title')
  <title> SD Dabolding Test </title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jurnal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Jurnal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
          {{session('error')}}
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tahun Pelajaran <a href="{{ route('tahunpel.index') }}">{{ thnPel() }}</a></h3>
              </div>
              <div class="card-header">
                <a href="/jurnalbelajar" class="btn btn-sm btn-primary">Tulis Jurnal</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                  Data <a href="#" class="alert-link">jurnal</a> {{session('sukses')}}
                </div>
                @endif

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>JUDUL</th>
                      <th>PENULIS</th>
                      <th>TANGGAL</th>
                      <th>UPDATE</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                      <tr>
                        <td>{{$post -> id}}</td>
                        <td><a href="{{route('site.single.post',$post->slug)}}">{{$post -> title}}</td>
                        <td><a href="/user/{{ $post -> user -> id }}/profile">{{$post -> user -> name}}</td>
                        <td>{{ $post -> created_at -> diffForHumans() }}</td>
                        <td>{{ $post -> updated_at -> diffForHumans() }}</td>
                        <td>
                          <a target="_blank" href="{{route('site.single.post',$post->slug)}}" class="btn btn-info btn-sm">View</a>
                          <a href="jurnal/{{$post->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                          <a href="jurnal/{{ $post->id }}/delete" class="btn btn-danger btn-sm delete">Hapus</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>JUDUL</th>
                      <th>PENULIS</th>
                      <th>TANGGAL</th>
                      <th>UPDATE</th>
                      <th></th>
                    </tr>
                    </tfoot>
                  </table>
              <!-- /.card-body -->
              </div>
            <!-- /.card -->
              <!-- /.card-body -->
              <div class="card-footer">
                SD Inpres Dabolding
              </div>
              <!-- /.card-footer-->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

@endsection

