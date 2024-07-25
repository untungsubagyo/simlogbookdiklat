@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
    <h1>Tambah Kategori Kegiatan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Kategori Kegiatan</li>
        </ol>
    </nav>
</div>
    
    <section class="section kategori_kegiatan">
        <div class="col-lg-12">
            <form action="{{ route('kategori_kegiatan.store') }}" method="POST">
                @csrf
                <div class="col-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
</section>
@endsection
