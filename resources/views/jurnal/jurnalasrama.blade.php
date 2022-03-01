@extends('layouts.boxed')

@section('title')
  <title> AdminLTE 3 | Jurnal Asrama </title>
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Jurnal <small>Asrama</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="/jurnalringkasan">Jurnal</a></li>
              <li class="breadcrumb-item active">Asrama</li>
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
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Jurnal Asrama</h5>

                <p class="card-text">
                  Jurnal Asrama menjadi bukti otentik proses pengkajian budaya papua dan modernisasi.
                </p>

                <a href="#" class="card-link">Tautan Jurnal Asrama</a>
                <a href="#" class="card-link">Detil Jurnal Asrama</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Jurnal Asrama</h5>

                <p class="card-text">
                  Jurnal Asrama mendeskripsikan penguatan dan penanaman nilai-nilai kehidupan.
                </p>
                <a href="#" class="card-link">Tautan Jurnal Asrama</a>
                <a href="#" class="card-link">Detil Jurnal Asrama</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Jurnal Asrama</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Jurnal Baca</h6>

                <p class="card-text">Imajinasi adalah modal dasar perubahan di masa depan.</p>
                <a href="#" class="btn btn-primary">Tautan Jurnal Baca</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Jurnal Asrama</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Surat Keberagaman</h6>

                <p class="card-text">Kekuatan dalam kebhinekaan.</p>
                <a href="#" class="btn btn-primary">Tautan Jurnal Keberagaman</a>
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