@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
    <h1>Edit Kategori Kegiatan</h1>
     <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kategori_kegiatan.index') }}">Kategori Kegiatan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

    <section class="section kategori_kegiatan">
        <div class="col-lg-12">
            <form action="{{ route('kategori_kegiatan.update', $kategoriKegiatan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $kategoriKegiatan->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="parent_id" class="form-label">Parent Kategori</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="">None</option>
                            @foreach($parentCategories as $parent)
                            <option value="{{ $parent->id }}" {{ $kategoriKegiatan->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
