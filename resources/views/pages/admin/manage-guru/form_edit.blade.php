{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<div class="container">
	<h2>Edit Data Guru</h2>
	<form action="{{ route('manage_guru.update', $guru->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="NIP">NIP</label>
			<input type="text" class="form-control" id="NIP" name="NIP" value="{{ $guru->NIP }}" required>
		</div>

		<div class="form-group">
			<label for="golongan_id">Golongan</label>
			<select class="form-control" id="golongan_id" name="golongan_id" required>
				<option value="">Pilih Golongan</option>
				@foreach($golongan as $gol)
					<option value="{{ $gol->id }}" {{ $guru->golongan_id == $gol->id ? 'selected' : '' }}>{{ $gol->golongan }} -
						{{ $gol->pangkat }}
					</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="user_id">User ID</label>
			<input type="text" class="form-control" id="user_id" name="user_id" value="{{ $guru->user_id }}" required>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
{{-- @endsection --}}