@extends('layouts.root-layout')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Data Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Guru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section guru">
        <div class="col-lg-12">
            <form action="{{ route('manage_guru.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-6">
                    <div class="form-group">
                        <label for="NIP">
                            NIP
                        </label>
                        <input type="text" class="form-control" id="NIP" name="NIP" value="{{ old('NIP') }}">
                        {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                    </div>
                    <div class="form-group">
                        <label for="name">
                            Nama
                        </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="form-group">
                        <label for="golongan_id">Golongan</label>
                        <select class="form-control" id="golongan_id" name="golongan_id" required>
                            <option value="">Pilih Golongan</option>
                            @foreach($golongan as $gol)
                                <option value="{{ $gol->id }}">{{ $gol->golongan }} - {{ $gol->pangkat }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="user_id">User_ID</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">Pilih User_ID</option>
                            @foreach($user as $user)
                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">Please, enter your email!</div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">Please, enter your password!</div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>  
            </form>
        </div>
    </section>    
@endsection
