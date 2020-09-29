@extends('layouts.master')

@section('header')
	<link href="{{asset('/bower_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet"/>
@stop

@section('content')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
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
			<div class="panel panel-profile">
				<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main">
								<img src="" class="img-circle" alt="Avatar">
								<h3 class="name">{{$guru->nama}} {{$guru->nama_belakang}}</h3>
								<span class="online-status status-available">Available</span>
							</div>
							<div class="profile-stat">
								<div class="row">
									<div class="col-md-4 stat-item">
										{{$guru->mapel->count()}} <span>Mata Pelajaran</span>
									</div>
									<div class="col-md-4 stat-item">
										15 <span>Awards</span>
									</div>
									<div class="col-md-4 stat-item">
										2174 <span>Points</span>
									</div>
								</div>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
						<!-- PROFILE DETAIL -->
						<div class="profile-detail">
							<div class="profile-info">
								<h4 class="heading">Data Diri</h4>
								<ul class="list-unstyled list-justify">
									<li>Alamat <span>{{$guru->alamat}}</span></li>										
								</ul>
							</div>
							<div class="text-center"><a href="/guru/{{$guru->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
						</div>
						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab-bottom-left1">
								<div class="margin-top-30 text-center">Mata Pelajaran yang Diampu {{$guru->nama}}</div>
								<div class="table-responsive">
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>KODE</th>
													<th>MAPEL</th>
													<th>SEMESTER</th>

												</tr>
											</thead>
											<tbody>
												@foreach($guru->mapel as $mapel)
												<tr>
													<td>{{$mapel->kode}}</td>
													<td>{{$mapel->nama}}</td>
													<td>{{$mapel->semester}}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>

								<div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
							</div>


						</div>
						<!-- END TABBED CONTENT -->
					</div>
					<!-- END RIGHT COLUMN -->
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- Modal -->

@stop


