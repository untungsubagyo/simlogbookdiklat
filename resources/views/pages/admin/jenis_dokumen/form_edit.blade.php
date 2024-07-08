@extends('layouts.root-layout')

@section('content')
<div class="pagetitle">
    <h1>Jenis Dokumen</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Jenis Dokumen</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">

        <form action="{{route('jenis_dokumen.update', $jenis_dokumen->id)}}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Jenis Dokumen</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$jenis_dokumen->name}}" required>
                    <div class="invalid-feedback">Please, enter Document Type!</div>
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