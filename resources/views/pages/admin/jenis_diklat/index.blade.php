@extends('layouts.root-layout')

@section('content')
<section>
	<div class="pagetitle">
		<h1>Jenis Diklat</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active">Jenis Diklat</li>
			</ol>
		</nav>
	</div>

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
				@forelse ($datas as $index => $data)
					<tr>
						<td>{{ $data->nama }}</td>
						<td>{{ $data->jenis_diklat }}</td>

						<td>
							{{-- <form onsubmit="return confirm('Apakah Anda yakin?')"
								action="{{route('jenis_diklat.destroy', $data->id)}}" method="POST">
								<a href="{{route('jenis_diklat.edit', $data->id)}}" class="btn btn-warning ">Edit</a>
								<button class="btn btn-danger" onclick="confirmDelete('{{ $data->id }}')">Delete</button>
								@csrf
								@method('DELETE')
							</form> --}}
							<a href="{{ route('jenis_diklat.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger" onclick="confirmDelete('{{ $data->id }}')">Delete</button>
                                <form id="delete-form-{{ $data->id }}" action="{{ route('jenis_diklat.destroy', $data->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="3" class="text-center alert alert-danger">Jenis Diklat masih kosong</td>
					</tr>
				@endforelse
			</tbody>
		</table>
		</div>
		  <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        </script>
	</section>
</section>
@endsection