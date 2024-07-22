@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
	<h1>Dashboard</h1>
	<nav>
		<ol class="breadcrumb">
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
								<h6>{{ $diklatCounts }}</h6>
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

	<div class="mb-5 mt-3" style="display: flex; align-items: center; justify-content: space-between">
		<h3 class="w-75" >Daftar Diklat Guru</h3>
		@if (!isset($dataDiklat['searchNotFound']))
			@if ($dataDiklat->count() > 0)
				<form id="search-diklat" style='width: 70%'>
					<input type="text" name="search" id="search-input" value="{{ request()->query->has('search') ? request()->query->get('search') : '' }}" placeholder="Cari nama diklat atau pemilik diklat" class="form-control">
				</form>
			@endif
		@else
			<form id="search-diklat" style='width: 70%'>
				<input type="text" name="search" id="search-input" value="{{ request()->query->has('search') ? request()->query->get('search') : '' }}" placeholder="Cari nama diklat atau pemilik diklat" class="form-control">
			</form>
		@endif
	</div>
	
	<div class="col" id="data-diklat-container">
		@if (!isset($dataDiklat['searchNotFound']))
			@if ($dataDiklat->count() > 0)
				@foreach ($dataDiklat as $index => $diklat)
					<div class="w-100" id="data-diklat" data-pemilik="{{ $diklat->username }}" data-namaDiklat="{{ $diklat->nama_diklat }}">
						<div class="card p-2">
							<div class="card-body">
								<h5 style="line-height: .3rem" class="card-title">
									Data Diklat
									<strong>
										{{ $diklat->nama_diklat }}
									</strong>
								</h5>
								<p style="line-height: .3rem" class="mb-4 text-black-50">Pemilik <strong>{{ $diklat->username }}</strong></p>
								<p style="line-height: .3rem" class="mb-4 text-black-50">NIP <strong>{{ $diklat->NIP }}</strong></p>
								<div style="display: flex; justify-content: space-between; align-items: flex-end">
									<a href="{{ route('diklat.show', $diklat->id) }}" class="btn btn-primary">Lihat</a>
									<p class="text-black-50 mb-0">
										Terakhir Diubah
										<span> | {{ $diklat->updated_at }}</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<!-- pagination navigate -->
				<div style="display: flex; justify-content: center; align-items: center;">
					<ul class="pagination">
						<li class="page-item">
							<a href="{{ $dataDiklat->url(1) }}" class="page-link">First</a>
						</li>
						<li class="page-item">
							@if ($dataDiklat->previousPageUrl() == null)
								<a href="#" class="page-link disabled">Previous</a>
							@else
								<a href="{{ $dataDiklat->previousPageUrl() }}" class="page-link">Previous</a>
							@endif
						</li>
						@php
							$startPage = max($dataDiklat->currentPage() - 2, 1);
							$endPage = min($dataDiklat->currentPage() + 2, $dataDiklat->lastPage());
						@endphp
						@if ($startPage > 1)
							<li class="page-item">
								<a href="{{ $dataDiklat->url(1) }}" class="page-link">1</a>
							</li>
							@if ($startPage > 2)
								<li class="page-item">
									<span class="pagination-ellipsis">...</span>
								</li>
							@endif
						@endif
						@foreach(range($startPage, $endPage) as $page)
							<li class="page-item">
								<a href="{{ $dataDiklat->url($page) }}" class="page-link">{{ $page }}</a>
							</li>
						@endforeach
						@if ($endPage < $dataDiklat->lastPage())
							@if ($endPage < $dataDiklat->lastPage() - 1)
								<li class="page-item">
									<span class="pagination-ellipsis">...</span>
								</li>
							@endif
							<li class="page-item">
								<a href="{{ $dataDiklat->url($dataDiklat->lastPage()) }}" class="page-link">{{ $dataDiklat->lastPage() }}</a>
							</li>
						@endif
						<li class="page-item">
							@if ($dataDiklat->nextPageUrl() == null)
								<a href="#" class="page-link disabled">Next</a>
							@else
								<a href="{{ $dataDiklat->nextPageUrl() }}" class="page-link">Next</a>
							@endif
						</li>
						<li class="page-item">
							@if ($dataDiklat->url($dataDiklat->lastPage()) == null)
								<a href="#" class="page-link disabled">Last</a>
							@else
								<a href="{{ $dataDiklat->url($dataDiklat->lastPage()) }}" class="page-link">Last</a>
							@endif
						</li>
					</ul>
				</div>
			@else
				<h5 class="text-center">
					Belum Ada Guru Yang Mencatat Diklat Nya
				</h5>
			@endif
		@else
			<h5 class="text-center">
				Data Diklat Tidak Di Temukan
			</h5>
		@endif

	</div>
</section>

<script>
	window.onload = () => {
		document.querySelectorAll('#data-diklat').forEach(el => {
			listDataDiklat.push({
				pemilik: el.getAttribute('data-pemilik'),
				namaDikalt: el.getAttribute('data-namaDiklat'),
				element: el 
			})
		})
		
		const serachInput = document.getElementById('search-input');
		document.getElementById('search-diklat').addEventListener('submit', ev => {
			ev.preventDefault()
			window.location.href = `/admin?q=${serachInput.value}`
		})
	}
</script>
@endsection