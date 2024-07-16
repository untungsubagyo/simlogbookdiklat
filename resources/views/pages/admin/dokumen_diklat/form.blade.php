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
        <form action="{{route('dokumen_diklat.store')}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-6">
                <div class="form-group">
                    <label for="name">File</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                    <div class="invalid-feedback">Tolong, kirim File Dokumen!</div>
                <div>
                <div class="form-group">
                    <label for="name">Nama Dokumen</label>
                    <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" required>
                    <div class="invalid-feedback">Tolong, masukkan Nama Dokumen Diklat!</div>
                <div>
                    <div classz="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="67" rows="4" required></textarea>
                        <div class="invalid-feedback">Tolong, isi Keterangan Dokumen!</div>
                    <div>
                        <div class="form-group">
                            <label for="jenis_dokumen_id">Jenis Dokumen</label>
                            <select class="form-control" id="jenis_dokumen_id" name="jenis_dokumen_id" required>
                                <option value="">Pilih Jenis Dokumen Diklat</option>
                                @foreach($jenis_dokumen as $jdokumen)
                                    <option value="{{ $jdokumen->id }}">{{ $jdokumen->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="name">Tautan Dokumen</label>
                                <input type="text" name="link" id="link" class="form-control" required>
                                <div class="invalid-feedback">Tolong, isi Link Dokumen!</div>
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
