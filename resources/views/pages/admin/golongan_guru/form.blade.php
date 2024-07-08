@extends('layouts.root-layout')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Pangkat & Golongan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Pangkat & Golongan</li>
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
                        <input type="text" name="golongan" id="golongan" class="form-control" required>
                        <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="form-group">
                        <label for="name">
                            Pangkat
                        </label>
                        <input type="text" name="pangkat" id="pangkat" class="form-control" required>
                        <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
