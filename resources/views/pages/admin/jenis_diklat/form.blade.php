@extends('layouts.root-layout')

@section('content')
	<h1>Jenis Diklat</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Jenis Diklat</li>
        </ol>
    </nav>

    <section class="section jenis_diklat">
        <div class="col-lg-12">
            <form action="{{route('jenis_diklat.store')}}" method="post" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">
                            Nama
                        </label>
                        <input type="text" name="nama" id="name" class="form-control" required>
                        <div class="invalid-feedback">Please, enter your name</div>
                    </div>    
                    <div class="form-group">
                            
                        <label for="jenis_diklat">Jenis Diklat:</label>
                        <select class="form-control" id="jenis_diklat" name="jenis_diklat" required>
                            <option value="">Pilih Jenis Diklat</option>
                            <option value="Pelatihan Profesional">Pelatihan Profesional</option>
                            <option value="Diklat Prajabatan">Diklat Prajabatan</option>
                            <option value="Diklat Kepemimpinan">Diklat Kepemimpinan</option>
                            <option value="Academic Exchange">Academic Exchange</option>
                            <option value="Academic Exchange">Fungsional</option>
                            <option value="Academic Exchange">Manajerial</option>
                            <option value="Academic Exchange">Lainnya</option>

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