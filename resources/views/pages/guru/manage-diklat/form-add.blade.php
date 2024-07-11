@extends('layouts.root-layout')

@section('sidebar')
   @include('pages.guru.sidebar')
@endsection

@section('content')
<div class="pagetitle">
   <h1>Tambah Record Dikat</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('homePageGuru') }}">Beranda</a></li>
         <li class="breadcrumb-item active">Tambah Diklat</li>
      </ol>
   </nav>
</div>
<main class="mt-28 w-full flex justify-center">
   <h1 class="text-3xl mb-8">Tambah Diklat</h1>

   <form action="{{ route('diklat.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <fieldset class="row g-3">
         <legend>Data Diklat</legend>
         <div class="col-md-12">
            <div class="form-floating">
               <input required type="text" class="form-control" id="floatingNamaDiklat" name="nama_diklat" placeholder="Nama Diklat">
               <label for="floatingNamaDiklat">Nama Diklat</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="text" class="form-control" id="floatingPenyelenggara" name="penyelenggara" placeholder="Penyelenggara">
               <label for="floatingPenyelenggara">Penyelenggara</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating mb-3">
               <select required class="form-select" name="tingkatan_diklat" id="floatingSelect" aria-label="Jenis Diklat">
                  <option selected>-- Pilih Tingkatan --</option>
                  <option value="Local">Local</option>
                  <option value="Regional">Regional</option>
                  <option value="Nasional">Nasional</option>
                  <option value="Internasiona">Internasiona</option>
               </select>
               <label for="floatingSelect">Jenis Diklat</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="text" class="form-control" id="floatingJumlahJam" name="jumlah_jam" placeholder="Jumlah Jam">
               <label for="floatingJumlahJam">Jumlah Jam</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="text" class="form-control" id="floatingNoSertifikat" name="no_sertifikat" placeholder="Nomor Sertifikat">
               <label for="floatingNoSertifikat">Nomor Sertifikat</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="date" class="form-control" id="floatingTanggalSertifikat" name="tanggal_sertifikat" placeholder="Tanggal Sertifikat">
               <label for="floatingTanggalSertifikat">Tanggal Sertifikat</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="text" class="form-control" id="floatingTahunPenyelenggara" name="tahun_penyelenggara" placeholder="Tahun Penyelenggara">
               <label for="floatingTahunPenyelenggara">Tahun Penyelenggara</label>
            </div>
         </div>
         <div class="col-12">
            <div class="form-floating">
               <textarea required class="form-control" placeholder="Tempat" id="floatingTempat" name="tempat"
                  style="height: 100px;" ></textarea>
               <label for="floatingTempat">Tempat</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="date" class="form-control" id="floatingTanggalMulai" name="tanggal_mulai" placeholder="Tanggal Mulai">
               <label for="floatingTanggalMulai">Tanggal Mulai</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="date" class="form-control" id="floatingTanggalSelesai" name="tanggal_selesai" placeholder="Tanggal Selesai">
               <label for="floatingTanggalSelesai">Tanggal Selesai</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="text" class="form-control" id="floatingNoSk" name="no_sk_penugasan" placeholder="No. SK Penugasan">
               <label for="floatingNoSk">No. SK Penugasan</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="date" class="form-control" id="floatingTanggalSkPenugasan" name="tanggal_sk_penugasan" placeholder="Tanggal Sk Penugasan">
               <label for="floatingTanggalSkPenugasan">Tanggal Sk Penugasan</label>
            </div>
         </div>
   
         <div class="col-md-6">
            <div class="form-floating mb-3">
               <select required class="form-select" name="id_jenis_diklat" id="floatingSelect" aria-label="Jenis Diklat">
                  <option>-- Pilih Jenis --</option>
                  @foreach ($data_jenisDiklat as $jenisDiklat)
                     <option value="{{ $jenisDiklat->id }}">{{ $jenisDiklat->nama }}</option>
                  @endforeach
               </select>
               <label for="floatingSelect">Jenis Diklat</label>
            </div>
         </div>
   
         <div class="col-md-6">
            <div class="form-floating mb-3">
               <select required class="form-select" name="id_kategori_kegiatan_diklat" id="floatingSelect" aria-label="Jenis Kegiatan Diklat">
                  <option>-- Pilih Jenis --</option>
                  @foreach ($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
               </select>
               <label for="floatingSelect">Jenis Kegiatan Diklat</label>
            </div>
         </div>
      </fieldset>

      <fieldset class="row g-3">
         <legend>Dokumen</legend>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="file" class="form-control" id="floatingNoSk" name="file_dokumen" placeholder="No. SK Penugasan">
               <label for="floatingNoSk">File</label>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating">
               <input required type="text" class="form-control" id="floatingNoSk" name="nama_dokumen" placeholder="No. SK Penugasan">
               <label for="floatingNoSk">Nama Dokumen</label>
            </div>
         </div>
         <div class="col-12">
            <div class="form-floating">
               <input type="text" class="form-control" id="floatingNoSk" name="link_dokumen" placeholder="No. SK Penugasan">
               <label for="floatingNoSk">Link Dokumen ( Optional )</label>
            </div>
         </div>
         <div class="col-12">
            <div class="form-floating">
               <textarea required class="form-control" placeholder="Tempat" id="floatingTempat" name="keterangan_dokumen"
                  style="height: 100px;"></textarea>
               <label for="floatingTempat">Keterangan Dokumen</label>
            </div>
         </div>
      </fieldset>

      <div class="text-end mt-3">
         <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
   </form>
</main>
@endsection