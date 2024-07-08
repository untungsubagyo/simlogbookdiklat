@extends('layouts.root-layout')

@section('content')
	<div class="pagetitle">
		<h1>Edot Data Guru</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">Guru</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section pangkat_golongan">
		<div class="col-lg-12">
			<form action="{{ route('manage_guru.update', $guru->id) }}" method="POST" class="row g-3 needs-validation" novalidate>
				@csrf
				@method('PUT')
				<div class="col-6">
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
						<label for="user_id">User_ID</label>
						<select class="form-control" id="user_id" name="user_id" required>
							<option value="">Pilih User_ID</option>
							@foreach($user as $user_item)
								<option value="{{ $user_item->id }}" {{ $guru->user_id == $user_item->id ? 'selected' : '' }}>{{ $user_item->name }}</option>
							@endforeach
						</select>
					</div>
					{{-- <div class="form-group">
						<label for="user_id">User ID</label>
						<input type="text" class="form-control" id="user_id" name="user_id" value="{{ $guru->user_id }}" required>
					</div> --}}
					<div class="form-group mt-4">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>	
				</div>	
			</form>
		</div>
	</section>
@endsection