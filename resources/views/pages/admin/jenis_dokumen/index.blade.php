@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
    <h1>Jenis Dokumen</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Jenis Dkumen</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">

        <div class="col-1">
            <div class="row">
                <a href="{{ route('jenis_dokumen.create')}}" class="btn btn-primary">Tambah</a>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif

        <table class="table-borderless datatable">
            <thead>
                <tr>
                    <th>Jenis Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda yakin?')" action="{{route('jenis_dokumen.destroy', $data->id)}}" method="POST">
                                <a href="{{route('jenis_dokumen.edit', $data->id)}}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
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
</section>
@endsection