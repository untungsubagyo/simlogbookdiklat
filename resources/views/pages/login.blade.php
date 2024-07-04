@extends('layouts.root-layout')

@section('body-content')
<div class="container-fluid p-0" style="background: url('{{ asset('asset/background.jpg') }}') no-repeat center center; background-size: cover; height: 100vh;">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.8);">
            <h2 class="text-center mb-4 text-black">Login</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="text-black">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password" class="text-black">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection
