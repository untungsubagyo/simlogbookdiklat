@extends('layouts.root-layout')

@section('sidebar')
   @include('pages.guru.sidebar')
@endsection

@section('content')
<div class="pagetitle">
   <h1>Edit Data Dikat</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('homePageGuru') }}">Beranda</a></li>
         <li class="breadcrumb-item active">Edit Data Diklat</li>
      </ol>
   </nav>
</div>

@if ($errors->any())
   <ul class="alert alert-danger" style="padding-left: 2rem;">
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
   </ul>
@endif

<main class="mt-28 w-full flex justify-center">
   @if ($diklat->count() > 0)
      <h1 class="text-3xl mb-8">Edit Data Diklat</h1>

      <form action="{{ route('diklat.update', $diklat[0]->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <fieldset class="row g-3">
            <legend>Data Diklat</legend>
            <div class="col-md-12">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->nama_diklat }}" type="text" class="form-control" id="floatingNamaDiklat" name="nama_diklat" placeholder="Nama Diklat">
                  <label for="floatingNamaDiklat">Nama Diklat <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->penyelenggara }}" type="text" class="form-control" id="floatingPenyelenggara" name="penyelenggara" placeholder="Penyelenggara">
                  <label for="floatingPenyelenggara">Penyelenggara <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating mb-3">
                  <select required class="form-select" name="tingkatan_diklat" id="floatingSelect" aria-label="Tingkatan Diklat">
                     <option {{ $diklat[0]->tingkatan_diklat == 'Lokal' ? 'selected' : ''}} value="Lokal">Lokal</option>
                     <option {{ $diklat[0]->tingkatan_diklat == 'Regional' ? 'selected' : ''}} value="Regional">Regional</option>
                     <option {{ $diklat[0]->tingkatan_diklat == 'Nasional' ? 'selected' : ''}} value="Nasional">Nasional</option>
                     <option {{ $diklat[0]->tingkatan_diklat == 'Internasional' ? 'selected' : ''}} value="Internasional">Internasional</option>
                  </select>
                  <label for="floatingSelect">Tingkatan Diklat <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->jumlah_jam }}" type="number" class="form-control" id="floatingJumlahJam" name="jumlah_jam" placeholder="Jumlah Jam">
                  <label for="floatingJumlahJam">Jumlah Jam <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->no_sertifikat }}" type="text" class="form-control" id="floatingNoSertifikat" name="no_sertifikat" placeholder="Nomor Sertifikat">
                  <label for="floatingNoSertifikat">Nomor Sertifikat <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->tanggal_sertifikat }}" type="date" class="form-control" id="floatingTanggalSertifikat" name="tanggal_sertifikat" placeholder="Tanggal Sertifikat">
                  <label for="floatingTanggalSertifikat">Tanggal Sertifikat <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->tahun_penyelenggara }}" type="number" class="form-control" id="floatingTahunPenyelenggara" name="tahun_penyelenggara" placeholder="Tahun Penyelenggara">
                  <label for="floatingTahunPenyelenggara">Tahun Penyelenggara <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-12">
               <div class="form-floating">
                  <textarea required class="form-control" placeholder="Tempat" id="floatingTempat" name="tempat"
                     style="height: 100px;" >{{ $diklat[0]->tempat }}</textarea>
                  <label for="floatingTempat">Tempat <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->tanggal_mulai }}" type="date" class="form-control" id="floatingTanggalMulai" name="tanggal_mulai" placeholder="Tanggal Mulai">
                  <label for="floatingTanggalMulai">Tanggal Mulai <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->tanggal_selesai }}" type="date" class="form-control" id="floatingTanggalSelesai" name="tanggal_selesai" placeholder="Tanggal Selesai">
                  <label for="floatingTanggalSelesai">Tanggal Selesai <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->no_sk_penugasan }}" type="text" class="form-control" id="floatingNoSk" name="no_sk_penugasan" placeholder="No. SK Penugasan">
                  <label for="floatingNoSk">No. SK Penugasan <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->tanggal_sk_penugasan }}" type="date" class="form-control" id="floatingTanggalSkPenugasan" name="tanggal_sk_penugasan" placeholder="Tanggal Sk Penugasan">
                  <label for="floatingTanggalSkPenugasan">Tanggal Sk Penugasan <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating mb-3">
                  <select required class="form-select" name="id_kategori_kegiatan_diklat" id="floatingSelect" aria-label="Jenis Kegiatan Diklat">
                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $diklat[0]->id_kategori ? 'selected' : '' }}>{{ $category->name }}</option>
                     @endforeach
                  </select>
                  <label for="floatingSelect">Jenis Kegiatan Diklat <span style="color: red;">*</span></label>
               </div>
            </div>

            <fieldset class="row g-3">
               <legend>Jenis Diklat</legend>
               <div class="col-md-6">
                  <div class="form-floating">
                     <input required type="text" value="{{ $diklat[0]->nama_jenis_diklat }}" class="form-control" id="floatingNamaJenisDiklat" name="nama_jenis_diklat" placeholder="Nama Jenis Diklat">
                     <label for="floatingNamaJenisDiklat">Nama Jenis Diklat <span style="color: red;">*</span></label>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-floating mb-3">
                     <select class="form-control" id="jenis_diklat" name="jenis_diklat" required>
                        <option {{ $diklat[0]->jenis_diklat == 'Pelatihan Profesional' ? 'selected' : '' }} value="Pelatihan Profesional">Pelatihan Profesional</option>
                        <option {{ $diklat[0]->jenis_diklat == 'Diklat Prajabatan' ? 'selected' : '' }} value="Diklat Prajabatan">Diklat Prajabatan</option>
                        <option {{ $diklat[0]->jenis_diklat == 'Diklat Kepemimpinan' ? 'selected' : '' }} value="Diklat Kepemimpinan">Diklat Kepemimpinan</option>
                        <option {{ $diklat[0]->jenis_diklat == 'Academic Exchange' ? 'selected' : '' }} value="Academic Exchange">Academic Exchange</option>
                        <option {{ $diklat[0]->jenis_diklat == 'Fungsional' ? 'selected' : '' }} value="Fungsional">Fungsional</option>
                        <option {{ $diklat[0]->jenis_diklat == 'Manajerial' ? 'selected' : '' }} value="Manajerial">Manajerial</option>
                        <option {{ $diklat[0]->jenis_diklat == 'Lainnya' ? 'selected' : '' }} value="Lainnya">Lainnya</option>
                     </select>
                     <label for="floatingSelect">Jenis Diklat <span style="color: red;">*</span></label>
                  </div>
               </div>
            </fieldset>
         </fieldset>

         <fieldset class="row g-3">
            <legend>Dokumen</legend>
            <div class="col-md-6">
               <div class="form-floating">
                  <input type="file" accept="application/pdf" class="form-control" id="file-dokumen" name="file_dokumen" placeholder="No. SK Penugasan">
                  <label for="file-dokumen">File (PDF)</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->link_dokumen }}" type="text" class="form-control" id="floatingNoSk" name="link_dokumen" placeholder="No. SK Penugasan">
                  <label for="floatingNoSk">Link Dokumen</label>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-floating">
                  <input required value="{{ $diklat[0]->nama_dokumen }}" type="text" class="form-control" id="floatingNoSk" name="nama_dokumen" placeholder="No. SK Penugasan">
                  <label for="floatingNoSk">Nama Dokumen <span style="color: red;">*</span></label>
               </div>
            </div>
            <div class="col-12">
               <div class="form-floating">
                  <textarea class="form-control" placeholder="Tempat" id="floatingTempat" name="keterangan_dokumen"
                     style="height: 100px;">{{ $diklat[0]->keterangan_dokumen }}</textarea>
                  <label for="floatingTempat">Keterangan Dokumen</label>
               </div>
            </div>
         </fieldset>

         <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary">Edit</button>
         </div>
      </form>
      <script>
         window.onload = () => {
            const dataTr = new DataTransfer()
            try {
               fetch('{{ $diklat[0]->file_dokumen }}')
                  .then(data => data.blob())
                  .then(file => {
                     const imgFile = new File([file], '{{ $diklat[0]->file_dokumen }}'.replace('{{ url("") . "/dokumen_diklat/" }}', ''), {type: file.type}) 
                     dataTr.items.add(imgFile)
                     document.getElementById('file-dokumen').files = dataTr.files
                  })
            } catch (error) {
               console.log(error)
            }


            const fileInput = document.getElementById('file-dokumen');
            fileInput.addEventListener('change', function() {
               const fileSize = fileInput.files[0].size;
               const fileType = fileInput.files[0].type;
               const allowedTypes = ['application/pdf'];
      
               if (fileSize > 1 * 1024 * 1024) { //* 1 MB
                  alert('Masukan File Dengan Ukuran MAksimal 1MB');
                  fileInput.files = dataTr.files;
               } else if (!allowedTypes.includes(fileType)) {
                  alert('Tipe File yang di Perbolehkan Hanya PDF');
                  fileInput.files = dataTr.files;
               }
            });
         }
      </script>
   @else
      <h5 class="text-center">Data Diklat Tidak Di Temukan</h5>
   @endif
</main>
@endsection