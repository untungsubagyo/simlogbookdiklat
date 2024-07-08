@extends('layouts.root-layout')

@section('content')
	<h1>Jenis Diklat</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Jenis Diklat</li>
        </ol>
    </nav>

	<section class="section jenis_diklat">
		<div class="col-lg-12">
				{{-- <a href="{{route('jenis_diklat.create')}}" class="btn btn-primary">Tambah</a> --}}
	        <form action="{{route('jenis_diklat.update', $jenis_diklat->id)}}" method="post" class="row g-3 needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">
                                Nama
                            </label>
                            <input type="text" name="nama" id="name" class="form-control" value="{{$jenis_diklat->nama}}" required>
                            <div class="invalid-feedback">Please, enter your name!</div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_diklat">Jenis Diklat:</label>
                            <select class="form-control" id="jenis_diklat" name="jenis_diklat" required>
                                <option value="null">Pilih Jenis Diklat</option>
                                <option {{ $jenis_diklat->jenis_diklat == 'Pelatihan Profesional' ? 'selected' : '' }} value="Pelatihan Profesional">Pelatihan Profesional</option>
                                <option {{ $jenis_diklat->jenis_diklat == 'Lemhanas' ? 'selected' : '' }} value="Lemhanas">Lemhanas</option>
                                <option {{ $jenis_diklat->jenis_diklat == 'Diklat Prajabatan' ? 'selected' : '' }} value="Diklat Prajabatan">Diklat Prajabatan</option>
                                <option {{ $jenis_diklat->jenis_diklat == 'Diklat Kepemimpinan' ? 'selected' : '' }} value="Diklat Kepemimpinan">Diklat Kepemimpinan</option>
                                <option {{ $jenis_diklat->jenis_diklat == 'Academic Exchange' ? 'selected' : '' }} value="Academic Exchange">Academic Exchange</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
	        </form>
	    </div>
    </section>
@endsection