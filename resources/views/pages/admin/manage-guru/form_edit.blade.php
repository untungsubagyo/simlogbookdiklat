@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
	<h1>Edit Data Guru</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="{{ route('manage_guru.index') }}">Kelola Guru</a></li>
			<li class="breadcrumb-item active">Edit</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

@if ($errors->any())
	<ul class="alert alert-danger" style="padding-left: 2rem;">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

<section class="section pangkat_golongan">
	<div class="col-lg-12">
		<form action="{{ route('manage_guru.update', $guru->id) }}" method="POST" class="row g-3 needs-validation"
			novalidate>
			@csrf
			@method('PUT')
			<div class="col-6">
				<div class="form-group">
					<label for="username">NIP</label>
					<input type="text" class="form-control" id="username" name="username" value="{{ $guru->NIP }}" required>
				</div>
				<div class="form-group">
					<label for="name_guru">Nama</label>
					<input type="text" class="form-control" id="name_guru" name="name_guru" value="{{ $guru->name_guru }}"
						required>
				</div>
				<div class="form-group">
					<label for="golongan_id">Golongan</label>
					<select class="form-control" id="golongan_id" name="golongan_id" required>
						<option value="">Pilih Golongan</option>
						@foreach($golongan as $gol)
							<option value="{{ 
									$gol->id }}" {{ 
										$guru->golongan_id == $gol->id ? 'selected' : '' }}>{{ $gol->golongan }} -
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
							<option value="{{ $user_item->id }}" {{ $guru->user_id == $user_item->id ? 'selected' : '' }}>
								{{ $user_item->email }}</option>
						@endforeach
					</select>
				</div>
				{{-- <div class="form-group">
					<label for="user_id">User ID</label>
					<input type="text" class="form-control" id="user_id" name="user_id" value="{{ $guru->user_id }}"
						required>
				</div> --}}
				<div class="form-group mt-4">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</section>
@endsection