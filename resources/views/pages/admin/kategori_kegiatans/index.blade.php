@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kategori Kegiatan</h1>
    <a href="{{ route('kategori_kegiatans.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Parent</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoriKegiatans as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->name }}</td>
                    <td>{{ $kategori->parent ? $kategori->parent->name : '-' }}</td>
                    <td>
                        <a href="{{ route('kategori_kegiatans.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kategori_kegiatans.destroy', $kategori->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
