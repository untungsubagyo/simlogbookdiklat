@extends('layouts.root-layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <title>Edit Guru</title>
</head>
<body>

<div class="container">
    <h1>Edit Pengguna</h1>
    <form id="guruForm" action="{{ route('manage_users.update', $usersData->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validatePassword()">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $usersData->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $usersData->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password (leave blank to keep current password)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <label for="profile_photo">Profile Photo</label>
            <input type="file" name="profile_photo" id="profile_photo" class="form-control">
            @if($usersData->profile_photo)
                <img src="{{ Storage::url($usersData->profile_photo) }}" alt="Profile Photo" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Guru</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var password_confirmation = document.getElementById("password_confirmation").value;

        if (password && password.length < 8) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password must be at least 8 characters!',
            });
            return false;
        }

        if (password !== password_confirmation) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Passwords do not match!',
            });
            return false;
        }

        return true;
    }

</script>
</body>
</html>
@endsection
