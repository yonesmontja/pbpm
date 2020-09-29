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
								<img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar">
								<h3 class="name">{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</h3>
								<span class="online-status status-available">Available</span>
							</div>
							<div class="profile-stat">
								<div class="row">
									<div class="col-md-4 stat-item">
										{{$siswa->mapel->count()}} <span>Mata Pelajaran</span>
									</div>
									<div class="col-md-4 stat-item">
										{{$siswa -> ratarataNilai()}} <span>Nilai Raport</span>
									</div>
									<div class="col-md-4 stat-item">
										{{$siswa -> totalNilai()}} <span>Total Nilai</span>
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
									<li>Jenis Kelamin <span> @if($siswa->jenis_kelamin == 'L') Laki-laki @endif @if($siswa->jenis_kelamin == 'P') Perempuan @endif </span></li>
									<li>Agama <span>{{$siswa->agama}}</span></li>
									<li>Alamat <span>{{$siswa->alamat}}</span></li>										
								</ul>
							</div>
							<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
						</div>
						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right">
						<h4 class="heading">Prestasi {{$siswa->nama_lengkap()}} </h4>
						<!-- AWARDS -->
						<div class="awards">
							<div class="row">
								<div class="col-md-3 col-sm-6">
									<div class="award-item">
										<div class="hexagon">
											<span class="lnr lnr-sun award-icon"></span>
										</div>
										<span>Most Bright Idea</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="award-item">
										<div class="hexagon">
											<span class="lnr lnr-clock award-icon"></span>
										</div>
										<span>Most On-Time</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="award-item">
										<div class="hexagon">
											<span class="lnr lnr-magic-wand award-icon"></span>
										</div>
										<span>Problem Solver</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="award-item">
										<div class="hexagon">
											<span class="lnr lnr-heart award-icon"></span>
										</div>
										<span>Most Loved</span>
									</div>
								</div>
							</div>
							<div class="text-center"><a href="#" class="btn btn-default">See all awards</a></div>
						</div>
						<!-- END AWARDS -->
						<!-- TABBED CONTENT -->
						<div class="custom-tabs-line tabs-line-bottom left-aligned">
							<ul class="nav" role="tablist">
								<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Data Nilai</a></li>
								<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Proyek PBPM <span class="badge">7</span></a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab-bottom-left1">
								<div class="table-responsive">
									<div class="row">
										<div class="col-md-6">
											<div class="profile-right">
											<!-- Button trigger modal -->
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
												Tambah Nilai
												</button>
											</div>
										</div>
										<div class="col-md-6">
											<div class="panel-heading">
												<h3 class="panel-title">Tabel Nilai {{$siswa->nama_lengkap()}}</h3>
											</div>
										</div>
									</div>
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>KODE</th>
													<th>MAPEL</th>
													<th>SEMESTER</th>
													<th>NILAI</th>
													<th>GURU</th>
													<th>AKSI</th>
												</tr>
											</thead>
											<tbody>
												@foreach($siswa->mapel as $mapel)
												<tr>
													<td>{{$mapel -> kode}}</td>
													<td>{{$mapel -> nama}}</td>
													<td>{{$mapel -> semester}}</td>
													<td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Masukkan nilai">{{$mapel -> pivot -> nilai}}</a></td>
													<td><a href="/guru/{{$mapel->guru_id}}/profile">{{$mapel->guru->nama}}</a></td>
													<td>
														<a href="/siswa/{{$siswa->id}}/{{$mapel->id}}/deletenilai" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								<div class="table-responsive">
									<div id="chartNilai"></div>
								</div>
								<div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
							</div>
							<div class="tab-pane fade" id="tab-bottom-left2">
								<div class="table-responsive">
									<table class="table project-table">
										<thead>
											<tr>
												<th>Title</th>
												<th>Progress</th>
												<th>Leader</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="#">Spot Media</a></td>
												<td>
													<div class="progress">
														<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
															<span>60% Complete</span>
														</div>
													</div>
												</td>
												<td><img src="{{asset('adminklo/img/user2.png')}}" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
												<td><span class="label label-success">ACTIVE</span></td>
											</tr>
											<tr>
												<td><a href="#">E-Commerce Site</a></td>
												<td>
													<div class="progress">
														<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">
															<span>33% Complete</span>
														</div>
													</div>
												</td>
												<td><img src="{{asset('adminklo/img/user1.png')}}" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
												<td><span class="label label-warning">PENDING</span></td>
											</tr>
											<tr>
												<td><a href="#">Project 123GO</a></td>
												<td>
													<div class="progress">
														<div class="progress-bar" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;">
															<span>68% Complete</span>
														</div>
													</div>
												</td>
												<td><img src="{{asset('adminklo/img/user1.png')}}" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
												<td><span class="label label-success">ACTIVE</span></td>
											</tr>
											<tr>
												<td><a href="#">Wordpress Theme</a></td>
												<td>
													<div class="progress">
														<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
															<span>75%</span>
														</div>
													</div>
												</td>
												<td><img src="{{asset('adminklo/img/user2.png')}}" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
												<td><span class="label label-success">ACTIVE</span></td>
											</tr>
											<tr>
												<td><a href="#">Project 123GO</a></td>
												<td>
													<div class="progress">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
															<span>100%</span>
														</div>
													</div>
												</td>
												<td><img src="{{asset('adminklo/img/user1.png')}}" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
												<td><span class="label label-default">CLOSED</span></td>
											</tr>
											<tr>
												<td><a href="#">Redesign Landing Page</a></td>
												<td>
													<div class="progress">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
															<span>100%</span>
														</div>
													</div>
												</td>
												<td><img src="{{asset('adminklo/img/user5.png')}}" alt="Avatar" class="avatar img-circle"> <a href="#">Jason</a></td>
												<td><span class="label label-default">CLOSED</span></td>
											</tr>
										</tbody>
									</table>
								</div>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/siswa/{{$siswa -> id}}/addnilai" method="POST" enctype="multipart/form-data">
      		{{csrf_field()}}
      		<div class="form-group">
      			<label for="mapel">Pilih Mata Pelajaran</label>
      			<select class="form-control" id="mapel" name="mapel">
      				@foreach ($matapelajaran as $mp)
      				<option value="{{$mp -> id}}">{{$mp->nama}}</option>
      				@endforeach
      			</select>
      		</div>
      		<div class="form-group {{$errors->has('nilai')?' has-error' : ''}}">
      			<label for="formGroupExampleInput">Nilai</label>
      			<input name="nilai" nilaitype="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nilai" value="{{old('nilai')}}" >
      			@if($errors->has('nilai'))
      			<span class="help-block">{{$errors->first('nilai')}}</span>
      			@endif
      		</div>
      	</div>
      	<div class="modal-footer">
      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      		<button type="submit" class="btn btn-primary">Submit</button>
      	</form>
      </div>
    </div>
  </div>
</div>
@stop

@section('footer')
	<script src="{{asset('/bower_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js')}}">
  	<script src="{{asset('/adminklo/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('/bower_components/highcharts/highcharts.js')}}"></script>
	<script src="{{asset('/bower_components/highcharts/modules/exporting.js')}}"></script>

	<script type="text/javascript">

	Highcharts.chart('chartNilai',{
	 chart: {
	  type: 'column'

	 },
	 title: {
	  text: "PEROLEHAN NILAI SISWA"
	 }, 
	 subtitle: {
	  text: 'TAHUN 2019 - 2020'
	 },
	 xAxis: {
	  categories: {!!json_encode($categories)!!},
	  crosshair: true
	 },
	 yAxis: {
	 	min: 0,
	 	title:{
	 		text: 'Nilai'
	 	}
	 },
	 tooltip:{
	 	headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	 	pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
	 	footerFormat: '</table>',
	 	shared: true,
	 	useHTML: true
	 },
	 plotOptions: {
	 	column: {
	 		pointPadding: 0.2,
	 		borderWidth: 0
	 	}
	 },
	 series: [{
	 	name: 'Nilai',
	 	data: {!!json_encode($data)!!}
	 }] 
	});

	$(document).ready(function() {
    $('.nilai').editable();
	});

	</script>

@stop