@extends('layouts.root-layout')

@section('content')
<div class="container">
    <h1>Tambah Kategori Kegiatan</h1>
    <form action="{{ route('kategori_kegiatan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
