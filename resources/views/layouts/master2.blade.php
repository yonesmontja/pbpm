<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- title -->
  @yield('title')
  <!-- end title -->

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- linear icons -->
  <link rel="stylesheet" href="{{asset('/admin/linearicons/WebFont/style.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('header')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.includes._navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.includes._sidebar')

  <!-- Content Wrapper. Contains page content -->

  <!-- Content Wrapper. Contains page content -->
  @yield('content2')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('layouts.includes._footer-main')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('/admin/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('/admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('/admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('/admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('/admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('/admin/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('/admin/dist/js/pages/dashboard2.js')}}"></script>
</body>
</html>
