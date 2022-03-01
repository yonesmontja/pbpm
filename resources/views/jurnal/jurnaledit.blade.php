@extends('layouts.collapsed')

@section('title')
  <title> AdminLTE 3 | Jurnal Belajar </title>
@endsection
@section('header')
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/admin/plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jurnal Belajar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="/jurnalringkasan">Jurnal</a></li>
              <li class="breadcrumb-item active">Belajar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Jurnal <small>Belajar</small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="card-body">
                <form action="/jurnal/{{$jurnal->id}}/update" method="POST" enctype="multipart/form-data" role="form">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group {{$errors->has('title') ?' has-error' : ''}}">
                        <label>Judul</label>
                        <input name="title" type="text" class="form-control" placeholder="Masukkan judul" value="{{$jurnal->title}}">
                        @if($errors->has('title'))
                        <span class="help-block">{{$errors->first('title')}}</span>
                        @endif
                      </div>
                    </div>
                     <div class="col-sm-4">
                      <div class="form-group">
                        <label for="customFile">Thumbnail</label> 

                        <div class="custom-file">

                          <input type="file" name="thumbnail" class="custom-file-input" id="customFile">
                          <label class="custom-file-label" for="customFile"></label>
                        </div>
                      </div>
                    </div>                   
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="content" class="textarea" placeholder="Tulis isi jurnal di sini"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$jurnal->content}}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>
              <p class="text-sm mb-0">
                Editor <a href="https://github.com/summernote/summernote">Documentation and license
                information.</a>
              </p>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>

    <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('footer')
<script src="{{asset('/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection