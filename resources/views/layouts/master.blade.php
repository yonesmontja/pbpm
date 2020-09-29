<!doctype html>
<html lang="en">

<head>
  <title>Data Siswa</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="{{asset('/adminklo/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/adminklo/vendor/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('/adminklo/vendor/linearicons/style.css')}}">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{asset('/adminklo/css/main.css')}}">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="{{asset('/adminklo/css/demo.css')}}">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- TOASTR -->
  <link rel="stylesheet" href="{{asset('/bower_components/toastr/toastr.min.css')}}">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="/adminklo/img/apple-icon.png">
  <link rel="icon" type="image/png}" sizes="96x96" href="{{asset('/adminklo/img/favicon.png')}}">
  @yield('header')
</head>

<body>
  <!-- WRAPPER -->
  <div id="wrapper">
    <!-- NAVBAR -->
      @include('layouts.includes._navbar')
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
      @include('layouts.includes._sidebar')
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    @yield('content')
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
      <div class="container-fluid">
        <p class="copyright">Created by <i class="fa fa-love"></i><a href="/adminklo/grafi_2.html">ALIRENA | 2020</a>
</p>
      </div>
    </footer>
  </div>
  <!-- END WRAPPER -->
  <!-- Javascript -->
  <script src="{{asset('/adminklo/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/adminklo/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/adminklo/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('/adminklo/scripts/klorofil-common.js')}}"></script>
  <script src="{{asset('/sweetalert/dist/sweetalert.min.js')}}"></script>
  <script src="{{asset('/bower_components/toastr/toastr.min.js')}}"></script>
  <script>
    @if(Session::has('sukses'))
    // Display a success toast, with a title
    toastr.success("{{Session::get('sukses')}}", "Sukses")
    @endif
  </script>
  @yield('footer')
  
  </body>
</html>
