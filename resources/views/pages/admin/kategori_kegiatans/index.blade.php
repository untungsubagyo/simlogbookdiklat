@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
    <h1>Kategori Kegiatan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Kategori Kegiatan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

  <section class="section guru">
<div class="col-lg-12">
    <a href="{{ route('kategori_kegiatan.create') }}" class="btn btn-primary mb-3">Tambah</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table datatable table-stripped">
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
  </section>
@endsection
