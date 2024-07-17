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

	<div class="mb-5 mt-3" style="display: flex; align-items: center; justify-content: space-between">
		<h3 class="w-75" >Daftar Diklat Guru</h3>
		@if ($dataDiklat->count() > 0)
			<input type="text" name="search" id="search-diklat" placeholder="Cari nama diklat atau pemilik diklat" class="form-control">
		@endif
	</div>

	<div class="col" id="data-diklat-container">
		@forelse ($dataDiklat as $index => $diklat)
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
		@empty
			<h5 class="text-center">
				Belum Ada Guru Yang Mencatat Diklat Nya
			</h5>
		@endforelse
	</div>
</section>

<script>
	window.onload = () => {
		const dataDiklatContainer = document.getElementById('data-diklat-container')
		const listDataDiklat = []
		document.querySelectorAll('#data-diklat').forEach(el => {
			listDataDiklat.push({
				pemilik: el.getAttribute('data-pemilik'),
				namaDikalt: el.getAttribute('data-namaDiklat'),
				element: el 
			})
		})
		
		document.getElementById('search-diklat').addEventListener('input', ev => {
			if (ev.target.value == '') {
				dataDiklatContainer.innerHTML = '';
				listDataDiklat.forEach(val => {
					dataDiklatContainer.appendChild(val.element);
				})
			} else {
				dataDiklatContainer.innerHTML = '';
				const result = listDataDiklat.filter(data => {
					return data.pemilik.includes(ev.target.value) || data.namaDikalt.includes(ev.target.value)
				})

				if (result.length > 0) {
					result.forEach(val => {
						dataDiklatContainer.appendChild(val.element);
					})
				} else {
					dataDiklatContainer.innerHTML = '<p>data diklat tidak di temukan</p>'
				}

			}
		})
	}
</script>
@endsection