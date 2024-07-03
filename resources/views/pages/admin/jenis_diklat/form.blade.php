@extends('dashboard.master')
@section('content')
    <div class="pagetitle">
        <h1>Jenis Diklat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Jenis Diklat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-1">
                <div class="row">
                     <a href="{{route('jenis_diklat.create')}}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
      <form action="{{route('jenis_diklat.store')}}" method="post" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="col-6">
            <div class="form-group">
                <label for="name">
                    Jenis Diklat
                </label>
                <input type="text" name="name" id="name" class="form-control" required>
                <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            </div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      </form>
        </div>
    </section>
@endsection
