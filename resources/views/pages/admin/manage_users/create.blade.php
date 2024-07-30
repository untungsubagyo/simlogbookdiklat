@extends('layouts.root-layout')
@section('content')
<div class="pagetitle">
    <h1>Tambah Pengguna</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('manage_users.index') }}">Daftar Pengguna</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

@if ($errors->any())
    <ul class="alert alert-danger" style="padding-left: 2rem;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<section class="section pengguna">
    <div class="col-lg-12">
        <form action="{{ route('manage_users.store') }}" method="POST" enctype="multipart/form-data"
            onsubmit="return validatePassword()" class="row g-3 needs-validation">
            @csrf
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="username">Username/NIP</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        required>
                </div>
                <div class="form-group">
                    <label for="profile_photo">Profile Photo</label>
                    <input type="file" name="profile_photo" id="profile_photo" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>

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
    </div>
</section>
@endsection