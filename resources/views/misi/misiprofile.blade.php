@extends('layouts.mailbox')

@section('title')
  <title> AdminLTE 3 | Visi-Misi </title>
@endsection
@section('header')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('/admin/plugins/toastr/toastr.min.css')}}">
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Visi-Misi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Visi</a></li>
              <li class="breadcrumb-item active">Visi Misi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
          {{session('sukses')}}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger" role="alert">
          {{session('error')}}
        </div>
        @endif
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('/images/logo.png')}}"
                       alt="User profile picture">
                </div>
                <p class="text-muted text-center">{{$misi_profile->misi}}</p>
                <p class="text-muted text-center">{{$misi_profile->misi_deskripsi}}</p>
                <p class="text-muted text-center">{{$misi_profile->misi_notes}}</p>
                <a href="/dashboard" class="btn btn-primary btn-block"><b>Home</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#misi" data-toggle="tab">VISI</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="misi">
                    <!-- Post -->
                    <div class="post">
                      <div class="row">
                        <div class="col-md-9">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{asset('/images/logo.png')}}" alt="user image">
                            <span class="username">
                              <a href="#">{{$misi_profile->misi_deskripsi}}</a>
                            </span>
                            <span class="description">Periode: {{$misi_profile->misi_start}} - {{$misi_profile->misi_end}}</span>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                            Tambah Visi Misi
                          </button>
                        </div>
                      </div>
                      <!-- /.user-block -->
                      @foreach($misi_profile->visi as $ms)
                      <p>Visi: {{$ms->id}} - {{$ms->visi}}</p>
                      <p>Pernyataan visi: {{$ms->id}} - {{$ms->visi_deskripsi}}</p>
                      <p>Catatan: {{$ms->id}} - {{$ms->visi_notes}}</p>
                      <p class="text-muted">{{$ms->pivot->visi_misi}}</p>
                      @endforeach
                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                      <p>Jumlah siswa: <a href="/test">{{$siswa->count()}}</a></p>
                      <p>Jumlah misi: <a href="/misi">{{$misi_profile->count()}}</a></p>
                    </div>
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('/images/logo.png')}}" alt="User Image">
                        <span class="username">
                          <a href="#">{{$misi_profile->misi_deskripsi}}</a>
                        </span>
                        <span class="description">Periode: {{$misi_profile->misi_start}} - {{$misi_profile->misi_end}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="{{asset('/admin/dist/img/photo1.png')}}" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="{{asset('/admin/dist/img/photo2.png')}}" alt="Photo">
                              <img class="img-fluid" src="{{asset('/admin/dist/img/photo3.jpg')}}" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="{{asset('/admin/dist/img/photo4.jpg')}}" alt="Photo">
                              <img class="img-fluid" src="{{asset('/admin/dist/img/photo1.png')}}" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->                 
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
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form isian data -->
        <form action="/misi/{{$misi_profile -> id}}/visimisiadd" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label for="visi">Visi</label>
            <select class="form-control" id="visi" name="visi">
              @foreach ($visio as $ms)
              <option value="{{$ms -> id}}">{{$ms->visi}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="visi_deskripsi">Pernyataan Visi</label>
            <select class="form-control" id="visi_deskripsi" name="visi_deskripsi">
              @foreach ($visio as $ms)
              <option value="{{$ms -> id}}">{{$ms->visi_deskripsi}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="visi_notes">Catatan Visi</label>
            <select class="form-control" id="visi_notes" name="visi_notes">
              @foreach ($visio as $ms)
              <option value="{{$ms -> id}}">{{$ms->visi_notes}}</option>
              @endforeach
            </select>
          </div>
          <div class="row">
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for="tahun_awal">Mulai?</label>
                <select class="form-control" id="tahun_awal" name="tahun_awal">
                  @foreach($tahun as $ta)
                  <option value="{{$ta -> tahun_awal}}">{{$ta -> tahun_awal}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="tahun_akhir">Target?</label>
                <select class="form-control" id="tahun_akhir" name="tahun_akhir">
                  @foreach($tahun as $ta)
                  <option value="{{$ta -> tahun_akhir}}">{{$ta -> tahun_akhir}}</option>
                  @endforeach
                </select>
              </div>
            </div>                         
          </div>
          <div class="form-group {{$errors->has('visi_misi')?' has-error' : ''}}">
            <label for="exampleFormControlInput1">Visi Misi</label>
            <input name="visi_misi" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan visi_misi" value="{{old('visi_misi')}}">
            @if($errors->has('visi_misi'))
            <span class="help-block">{{$errors->first('visi_misi')}}</span>
            @endif
          </div>
        <!-- akhir form isian data -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection
@section('footer')
<script src="{{asset('/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('/admin/plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });
</script>

@endsection