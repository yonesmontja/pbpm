



<div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  SweetAlert2 Examples
                </h3>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-success swalDefaultSuccess">
                  Launch Success Toast
                </button>
                <button type="button" class="btn btn-info swalDefaultInfo">
                  Launch Info Toast
                </button>
                <button type="button" class="btn btn-danger swalDefaultError">
                  Launch Error Toast
                </button>
                <button type="button" class="btn btn-warning swalDefaultWarning">
                  Launch Warning Toast
                </button>
                <button type="button" class="btn btn-default swalDefaultQuestion">
                  Launch Question Toast
                </button>
                <div class="text-muted mt-3">
                  For more examples look at <a href="https://sweetalert2.github.io/">https://sweetalert2.github.io/</a>
                </div>
              </div>
              <!-- /.card -->
            </div>




<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>

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
<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Toast Title</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</div></div><div class="toast bg-info fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Toast Title</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</div></div><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Toast Title</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</div></div></div>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Signed in successfully'
})


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DATA SISWA</title>
  <link rel="stylesheet" href="{{asset('/bootstrap-4.5.3-dist/css/bootstrap.min.css')}}">
    <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
</head>
<body>
  <style type="text/css">
    table tr td,
    table tr th{
      font-size: 9pt;
    }
  </style>
  <center>
    <h5>Data Siswa</h4>
  </center>
 
  <table class="table table-bordered">
    <caption>List of users</caption>
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama Depan</th>
        <th>Nama Belakang</th>
        <th>NIS</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1 @endphp
      @foreach($data_siswa as $siswa)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{$siswa -> nama_depan}}</td>
        <td>{{$siswa -> nama_belakang}}</td>
        <td>{{$siswa -> nis}}</td>
        <td>{{$siswa -> jenis_kelamin}}</td>
        <td>{{$siswa -> agama}}</td>
        <td>{{$siswa -> alamat}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

</body>
</html>