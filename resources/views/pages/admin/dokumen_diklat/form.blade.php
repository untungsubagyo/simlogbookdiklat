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
        <form action="{{route('dokumen_diklat.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-6">
                <div class="form-group">
                    <label for="name">File</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                    <div class="invalid-feedback">Please, enter File!</div>
                <div>
                <div class="form-group">
                    <label for="name">Nama Dokumen</label>
                    <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" required>
                    <div class="invalid-feedback">Please, enter the title!</div>
                <div>
                    <div classz="form-group">
                        <label for="content">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                        <div class="invalid-feedback">Please, enter your content!</div>
                    <div>
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
