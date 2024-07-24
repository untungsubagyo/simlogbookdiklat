@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
    <h1>Jenis Dokumen</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Jenis Dokumen</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="col-lg-12">
        <a href="{{ route('jenis_dokumen.create')}}" class="btn btn-primary">Tambah</a>

        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{session('success')}}
        </div>
        @endif

        <table class="table datatable table-stripped">
            <thead>
                <tr>
                    <th>Jenis Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $index => $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>
                            {{-- <form onsubmit="return confirm('Apakah Anda yakin?')" action="{{route('jenis_dokumen.destroy', $data->id)}}" method="POST">
                                <a href="{{route('jenis_dokumen.edit', $data->id)}}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form> --}}
                            <a href="{{ route('jenis_dokumen.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger" onclick="confirmDelete('{{ $data->id }}')">Delete</button>
                                <form id="delete-form-{{ $data->id }}" action="{{ route('jenis_dokumen.destroy', $data->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center alert alert-danger">Data Jenis Dokumen masih
                            Kosong</td>
                    </tr>
                @endforelse
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