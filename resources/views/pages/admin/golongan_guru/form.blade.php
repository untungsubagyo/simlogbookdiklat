@extends('layouts.root-layout')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Pangkat & Golongan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('golongan_guru.index') }}">Pangkat & Golongan</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section pangkat_golongan">
        <div class="col-lg-12">
            <form action="{{ route('golongan_guru.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">
                            Golongan
                        </label>
                        <input type="text" name="golongan" id="golongan" class="form-control @error('golongan') is-invalid @enderror" value="{{ old('golongan') }}" required>
                        @error('golongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback">Please, enter your golongan!</div>
                    </div>
                    <div class="form-group">
                        <label for="name">
                            Pangkat
                        </label>
                        <input type="text" name="pangkat" id="pangkat" class="form-control @error('pangkat') is-invalid @enderror" value="{{ old('pangkat') }}" required>
                        @error('golongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback">Please, enter your pangkat!</div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
