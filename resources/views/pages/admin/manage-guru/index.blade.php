@extends('layouts.root-layout')

@section('content')
    <div class="pagetitle">
        <h1>Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Guru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section guru">
        <div class="col-lg-12">
            <a href="{{ route('manage_guru.create') }}" class="btn btn-primary">Tambah</a>

            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table datatable table-stripped">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Golongan</th>
                        <th>User Id</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{ $data->NIP }}</td>
                            <td>{{ $data->golongan }}</td>
                            <td>{{ $data->user_id }}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda yakin?')"
                                    action="{{ route('manage_guru.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('manage_guru.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center alert alert-danger">Data Kategori masih Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection