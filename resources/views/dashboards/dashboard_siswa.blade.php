 @extends('layouts.mailbox')

 @section('title')
     <title> SD Dabolding Portofolio </title>
 @endsection

 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         @if (auth()->user()->role == 'siswa')
                             <h1>Dashboard Siswa</h1>
                         @else
                             <h1>Dashboard</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="/tdu">Home</a></li>
                             @if (auth()->user()->role == 'siswa')
                                 <li class="breadcrumb-item active">Dashboard Siswa</li>
                             @else
                                 <li class="breadcrumb-item active">Dashboard</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">

             <!-- Default box -->
             <div class="card card-solid">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-sm-6">
                             <h3 class="d-inline-block d-sm-none">Selamat Datang</h3>
                             <div class="col-12">
                                 <img src="{{ asset('/admin/dist/img/prod-1.jpeg') }}" class="product-image"
                                     alt="Product Image">
                             </div>
                             <div class="mt-4">
                                 <div class="col-12">
                                     <div class="col-12 product-image-thumbs">
                                         <div class="product-image-thumb active"><img
                                                 src="{{ asset('/admin/dist/img/prod-1.jpeg') }}" alt="Product Image">
                                         </div>
                                         <div class="product-image-thumb"><img
                                                 src="{{ asset('/admin/dist/img/prod-2.jpeg') }}" alt="Product Image">
                                         </div>
                                         <div class="product-image-thumb"><img
                                                 src="{{ asset('/admin/dist/img/prod-3.jpeg') }}" alt="Product Image">
                                         </div>
                                         <div class="product-image-thumb"><img
                                                 src="{{ asset('/admin/dist/img/prod-4.jpeg') }}" alt="Product Image">
                                         </div>
                                         <div class="product-image-thumb"><img
                                                 src="{{ asset('/admin/dist/img/prod-5.jpeg') }}" alt="Product Image">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <hr>
                         <div class="col-sm-6">
                             <h3 class="d-inline-block d-sm-none"></h3>
                             <!-- Profile Image -->
                             <div class="col-12">
                                 <div class="card card-primary card-outline">
                                     <div class="card-body box-profile">
                                         <div class="text-center">
                                             <img class="profile-user-img img-fluid img-circle"
                                                 src="{{ auth()->user()->avatar() }}" alt="User profile picture">
                                         </div>
                                         @if (auth()->user()->role == 'siswa')
                                             <h3 class="profile-username text-center"><a
                                                     href="#">{{ $user1->siswa->nama_depan }}
                                                     {{ $user1->siswa->nama_belakang }}</a></h3>
                                             <h5 class="text-center"><a href="/test/{{ auth()->user()->siswa->id }}/profile"
                                                     class="btn btn-primary btn-lg btn-flat">
                                                     Lihat Nilai
                                                 </a></h5>
                                         @else
                                         @endif


                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>
                             <!-- /.card -->
                             <hr>
                         </div>
                     </div>
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </section>
         <!-- /.content -->
     </div>
 @endsection
