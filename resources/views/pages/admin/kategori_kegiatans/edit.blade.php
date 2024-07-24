@extends('layouts.root-layout')

@section('content')
<div class="container">
    <h1>Edit Kategori Kegiatan</h1>
    <form action="{{ route('kategori_kegiatan.update', $kategoriKegiatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $kategoriKegiatan->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
