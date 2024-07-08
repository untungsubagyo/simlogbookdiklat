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
    <div class="row">
        <form action="{{route('dokumen_diklat.update', $dokumen_diklat->id)}}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="col-6">
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="file" id="file" class="form-control" value="{{$dokumen_diklat->file}}" required>
                    <div class="invalid-feedback">Please, enter File!</div>
                <div>
                <div class="form-group">
                    <label for="name">Nama Dokumen</label>
                    <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" value="{{$dokumen_diklat->nama_dokumen}}"required>
                    <div class="invalid-feedback">Please, enter the title!</div>
                <div>
                    <div classz="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="67" rows="4" class="form-control">{{$dokumen_diklat->keterangan}}</textarea>
                        <div class="invalid-feedback">Please, enter your content!</div>
                    <div>
                        <div class="form-group">
                            <label for="jenis_dokumen_id">Jenis Dokumen</label>
                            <select class="form-control" id="jenis_dokumen_id" name="jenis_dokumen_id" required>
                                <option value="">Pilih Jenis Dokumen Diklat</option>
                                @foreach($jenis_dokumen as $jdokumen)
                                    <option value="{{ $jdokumen->id }}">{{ $dokumen_diklat->jenis_dokumen_id == $jdokumen->id ? 'selected' : '' }} {{$jdokumen->name}}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="name">Tautan Dokumen</label>
                                <input type="text" name="link" id="link" class="form-control" value="{{$dokumen_diklat->link}}"required>
                                <div class="invalid-feedback">Please, enter the title!</div>
                            <div>
                        </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
