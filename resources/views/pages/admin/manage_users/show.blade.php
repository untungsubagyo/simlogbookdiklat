@extends('layouts.root-layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Detail Guru</title>
</head>
<body>

<div class="container">
    <h1>Detail Guru</h1>
    <div class="card">
        <div class="card-header">
            <h3>{{ $usersData->name }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="profile_photo">Profile Photo</label>
                <div>
                    @if($usersData->profile_photo)
                        <img src="{{ Storage::url($usersData->profile_photo) }}" alt="Profile Photo" width="150">
                    @else
                        <p>No Photo</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <p>{{ $usersData->email }}</p>
            </div>
            <div class="form-group">
                <label for="created_at">Created At</label>
                <p>{{ $usersData->created_at }}</p>
            </div>
            <div class="form-group">
                <label for="updated_at">Updated At</label>
                <p>{{ $usersData->updated_at }}</p>
            </div>
            <a href="{{ route('manage_users.edit', $usersData->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('manage_users.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>

</body>
</html>
@endsection
