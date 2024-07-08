@extends('layouts.root-layout')

@section('content')
<div class="container">
    <h1>Kategori Kegiatan</h1>
    <a href="{{ route('kategori_kegiatan.create') }}" class="btn btn-primary mb-3">Tambah</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Parent</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kategoriKegiatans as $index => $kategori)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kategori->name }}</td>
                <td>{{ $kategori->parent ? $kategori->parent->name : '-' }}</td>
                <td>
                    <a href="{{ route('kategori_kegiatan.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" onclick="confirmDelete('{{ $kategori->id }}')">Delete</button>
                    <form id="delete-form-{{ $kategori->id }}" action="{{ route('kategori_kegiatan.destroy', $kategori->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
