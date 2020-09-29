@extends('layouts.frontend')

@section('content')

<section class="banner-area relative about-banner" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Pendaftaran
				</h1>
				<p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="about.html"> Pendaftaran</a></p>
			</div>
		</div>
	</div>
</section>

<section class="search-course-area relative" style="background: unset;">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-3 col-md-6 search-course-left">
				<h1 class="text-white">
					Pendaftaran Online <br>
					bergabung bersama kami!
				</h1>
				<p>
					Anak Bangsa yang Mencintai dan Memiliki Daerahnya.
				</p>
			</div>
			<div class="col-lg-49 col-md-6 search-course-right section-gap">
				<!--{!!'<b>Nama</b>'!!}-->
				{!! Form::open(['url' => '/postregister','class'=>'form-wrap']) !!}

				<!--form class="form-wrap" action="#"-->
					<h4 class="text-white pb-20 text-center mb-30">Formulir Pendaftaran</h4>
					{!!Form::text('nama_depan','',['class'=>'form-control','placeholder' => 'Nama Depan'])!!}
					{!!Form::text('nama_belakang','',['class'=>'form-control','placeholder' => 'Nama Belakang'])!!}
					{!!Form::text('agama','',['class'=>'form-control','placeholder' => 'Agama'])!!}
					{!!Form::textarea('alamat','',['class'=>'form-control','placeholder' => 'Alamat'])!!}
					<div class="form-select" id="service-select">
						{!!Form::select('jenis_kelamin',['' => 'Pilih Jenis Kelamin', 'L' => 'Laki-Laki','P' => 'Perempuan'],'L');!!}
					</div>			
					{!!Form::email('email','',['class'=>'form-control','placeholder' => 'Email'])!!}
					{!!Form::password('password',['class'=>'form-control','placeholder' => 'Password'])!!}	
					<input type="submit" class="primary-btn text-uppercase" value="Kirim" style="text-align: center;"></input>
				<!--/form-->
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</section>

@stop