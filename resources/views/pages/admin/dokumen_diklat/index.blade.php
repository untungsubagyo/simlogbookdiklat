@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
    <h1>Dokumen Diklat</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Dokumen Diklat</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="col-lg-12">
        <a href="{{ route('dokumen_diklat.create')}}" class="btn btn-primary">Tambah</a>

        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif

        <table class="table datatable table-stripped">
            <thead>
                <tr>
                    <th>Dokumen</th>
                    <th>Nama Dokumen</th>
                    <th>Keterangan</th>
                    <th>Jenis Dokumen</th>
                    <th>Tautan Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td><img src="/storage/file_dokumen/{{$data->file}}"></td>
                        <td>{{$data->nama_dokumen}}</td>
                        <td>{{$data->keterangan}}</td>
                        <td>{{$data->jenis_dokumen_id}}</td>
                        <td>{{$data->link}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda yakin?')" action="{{route('dokumen_diklat.destroy', $data->id)}}" method="POST">
                                <a href="{{route('dokumen_diklat.edit', $data->id)}}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center alert alert-danger">Data Dokumen Diklats masih
                            Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection