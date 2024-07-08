@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
	<h1>Pangkat & Golongan</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Home</a></li>
			<li class="breadcrumb-item active">Pangkat & Golongan</li>
		</ol>
	</nav>
</div>
<section>
	<h1>Jenis Diklat</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Home</a></li>
			<li class="breadcrumb-item active">Jenis Diklat</li>
		</ol>
	</nav>

	<section class="section jenis_diklat">
		<div class="col-lg-12">
			<a href="{{route('jenis_diklat.create')}}" class="btn btn-primary">Tambah</a>
		</div>
		@if (@session('success'))
			<div class="alert alert-success mt-3">
				{{session('success')}}
			</div>

		@endif
		<table class="table datatable table-stripped">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Jenis Diklat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($datas as $data)
					<tr>
						<td>{{ $data->nama }}</td>
						<td>{{ $data->jenis_diklat }}</td>

						<td>
							<form onsubmit="return confirm('Apakah Anda yakin?')"
								action="{{route('jenis_diklat.destroy', $data->id)}}" method="POST">
								<a href="{{route('jenis_diklat.edit', $data->id)}}" class="btn btn-warning ">Edit</a>
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger">Hapus</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="3" class="text-center alert alert-danger">Jenis Pangkat masih kosong</td>
					</tr>
				@endforelse
			</tbody>
		</table>
		</div>
	</section>
</section>
@endsection