@extends('layouts.root-layout')

@section('username')
{{ $userdata->name }}
@endsection

@section('user-role')
@if ($userdata->role_id == 1)
	Admin
@else
	Guru
@endif
@endsection

@section('content')
<div class="pagetitle">
	<h1>Dashboard</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Home</a></li>
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section dashboard">
	<h1 class="text-3xl font-semibold">
		Selamat Datang
		<span class="fw-bold">
			{{ $userdata->name }}
		</span>
	</h1>

	<div class="col-lg-8 w-100">
		<div class="row">
			<div class="col-xxl-4 col-md-6">
				<div class="card info-card sales-card">
					<div class="card-body">
						<h5 class="card-title">Banyak Guru <span>| Total</span></h5>
						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
								<i class="bi bi-people"></i>
							</div>
							<div class="ps-3">
								<h6>{{ $guruCounts }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xxl-4 col-md-6">
				<div class="card info-card revenue-card">
					<div class="card-body">
						<h5 class="card-title">Banyak Diklat <span>| Total</span></h5>
						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
								<i class="bi bi-book"></i>
							</div>
							<div class="ps-3">
								<h6>{{ $dataDiklat->count() }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xxl-4 col-xl-12">
				<div class="card info-card customers-card">
					<div class="card-body">
						<h5 class="card-title">Rata-Rata Data Diklat <span>| per-guru</span></h5>

						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
								<i class="bi bi-graph-up"></i>
							</div>
							<div class="ps-3">
								<h6>{{ $averageDiklatCount }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<h3 class="mt-3 mb-4">Daftar Diklat Guru</h3>

	<div class="col">
		@forelse ($dataDiklat as $diklat)
			<div lass="w-100">
				<div class="card">
					<div class="card-body">
						<h5 style="line-height: .3rem" class="card-title">
							Data Diklat : {{ $diklat->name }}
						</h5>
						<p style="line-height: .3rem" class="mb-4 text-black-50">NIP {{ $diklat->NIP }}</p>
						<div style="display: flex; justify-content: space-between; align-items: center">
							<a href="{{ route('viewDiklatGuru', $diklat->id) }}" class="btn btn-primary">Lihat</a>
							<p class="text-black-50">
								Terakhir Diubah
								<span> | {{ $diklat->updated_at }}</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		@empty
			<h5 class="text-center">
				Belum Ada Guru Yang Mencatat Diklat Nya
			</h5>
		@endforelse
	</div>
</section>
@endsection