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
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('header')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.includes._navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.includes._sidebar')

  <!-- Content Wrapper. Contains page content -->


  <!-- Content Wrapper. Contains page content -->
  @yield('content3')
  <!-- /.content-wrapper -->

  @include('layouts.includes._footer-sidebar')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('/admin/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('/admin/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('/admin/dist/js/demo.js')}}"></script>
<script src="{{asset('/admin/dist/js/pages/dashboard3.js')}}"></script>
</body>
</html>
