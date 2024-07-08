@extends('components.navbar')
<section style="margin-top: 8rem;">
	<h1>Jenis Diklat</h1>
	<div class="row">
		<div class="col-1">
			<div class="row">
				<a href="{{route('jenis_diklat.create')}}" class="btn btn-primary">Tambah</a>
			</div>
		</div>
		@if (@session('success'))
			<div class="alert alert-success">
				{{session('success')}}
			</div>

		@endif
		<table class="table-borderless datatable">
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
					<div class="alert alert-danger">kosong</div>
				@endforelse
			</tbody>
		</table>

	</div>
</section>