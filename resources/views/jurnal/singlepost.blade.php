@extends('layouts.top-nav-sidebar')

@section('title')
  <title> AdminLTE 3 | Data Siswa </title>
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Jurnal <small>Siswa</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="/jurnalringkasan">Jurnal</a></li>
              <li class="breadcrumb-item active">Siswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{!!$post->title!!}</h5>

                <p class="card-text">
                  {!!$post->content!!}
                </p>

                <a href="/jurnalpost" class="card-link">Tautan Jurnal Siswa</a>

              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-2">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Ditulis oleh: {{ $post -> user -> name }}</h5>
                <p class="card-text">{{ $post -> created_at -> diffForHumans() }}</p>
              </div>
              <div class="card-body">
                <h6 class="card-title"></h6>

                <p class="card-text">{{ $post -> kategori -> kategori }}</p>

                <p class="card-text">Updated: {{ $post -> updated_at -> diffForHumans() }}</p>
                <a href="/user/{{ $post -> user_id }}/profile" class="btn btn-primary">Profil Penulis</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  @endsection
