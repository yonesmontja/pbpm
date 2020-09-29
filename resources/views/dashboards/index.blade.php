@extends('layouts.master')

@section('content')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<!-- RIGHT COLUMN -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">5 Besar</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>RANGKING</th>
										<th>NAMA</th>
										<th>NILAI</th>
									</tr>
								</thead>
								<tbody>
									@php
									$rangking = 1;
									@endphp
									@foreach(rangking5Besar() as $s)
									<tr>
										<td>{{$rangking}}</td>
										<td><a href="/siswa/{{$s->id}}/profile">{{$s->nama_lengkap()}}</a></td>
										<td>{{$s->ratarataNilai}}</td>
									</tr>
									@php
									$rangking++;
									@endphp
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel">
						<div class="metric">
							<span class="icon"><i class="fa fa-user"></i></span>
							<p>
								<span class="number">{{totalSiswa()}}</span>
								<span class="title">Total Siswa</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel">
						<div class="metric">
							<span class="icon"><i class="fa fa-user"></i></span>
							<p>
								<span class="number">{{totalGuru()}}</span>
								<span class="title">Total Guru</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop