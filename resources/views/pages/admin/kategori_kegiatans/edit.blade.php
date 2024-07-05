@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori Kegiatan</h1>
    <form action="{{ route('kategori_kegiatans.update', $kategoriKegiatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $kategoriKegiatan->name }}" required>
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Kategori</label>
            <select class="form-control" id="parent_id" name="parent_id">
                <option value="">None</option>
                @foreach($parentCategories as $parent)
                <option value="{{ $parent->id }}" {{ $kategoriKegiatan->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
