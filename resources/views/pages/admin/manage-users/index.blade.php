@extends('layouts.root-layout')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Kelola User</title>
</head>
<body>
	@section('content')
	<div class="pagetitle">
		<h1>Kelola Pengguna</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">Pangkat & Golongan</li>
			</ol>
		</nav>
	</div>
	<div class="d-flex justify-content-between align-items-center mb-4">
		<h1>Daftar User</h1>
		<a href="{{ route('manage_users.create') }}" class="btn btn-primary">Add New Guru</a>
	</div>

	@if(session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
	@endif

	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Email</th>
				<th>NIP</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usersData as $index => $user)
				<tr>
					<td>{{ $index + 1 }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						<a href="{{ route('manage_users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
						<form action="{{ route('manage_users.destroy', $user->id) }}" method="POST"
							style="display:inline-block;">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
						<a href="{{ route('manage_users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
@endsection