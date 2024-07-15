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
                  <input value="{{ $diklat[0]->nama_diklat }}" type="text" class="form-control" id="floatingNamaDiklat" name="nama_diklat" placeholder="Nama Diklat">
                  <label for="floatingNamaDiklat">Nama Diklat</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->penyelenggara }}" type="text" class="form-control" id="floatingPenyelenggara" name="penyelenggara" placeholder="Penyelenggara">
                  <label for="floatingPenyelenggara">Penyelenggara</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->tingkatan_diklat }}" type="text" class="form-control" id="floatingPassword" name="tingkatan_diklat" placeholder="Password">
                  <label for="floatingPassword">Tingkatan Diklat</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->jumlah_jam }}" type="text" class="form-control" id="floatingJumlahJam" name="jumlah_jam" placeholder="Jumlah Jam">
                  <label for="floatingJumlahJam">Jumlah Jam</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->no_sertifikat }}" type="text" class="form-control" id="floatingNoSertifikat" name="no_sertifikat" placeholder="Nomor Sertifikat">
                  <label for="floatingNoSertifikat">Nomor Sertifikat</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->tanggal_sertifikat }}" type="date" class="form-control" id="floatingTanggalSertifikat" name="tanggal_sertifikat" placeholder="Tanggal Sertifikat">
                  <label for="floatingTanggalSertifikat">Tanggal Sertifikat</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->tahun_penyelenggara }}" type="text" class="form-control" id="floatingTahunPenyelenggara" name="tahun_penyelenggara" placeholder="Tahun Penyelenggara">
                  <label for="floatingTahunPenyelenggara">Tahun Penyelenggara</label>
               </div>
            </div>
            <div class="col-12">
               <div class="form-floating">
                  <textarea class="form-control" placeholder="Tempat" id="floatingTempat" name="tempat"
                     style="height: 100px;" >{{ $diklat[0]->tempat }}</textarea>
                  <label for="floatingTempat">Tempat</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->tanggal_mulai }}" type="date" class="form-control" id="floatingTanggalMulai" name="tanggal_mulai" placeholder="Tanggal Mulai">
                  <label for="floatingTanggalMulai">Tanggal Mulai</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->tanggal_selesai }}" type="date" class="form-control" id="floatingTanggalSelesai" name="tanggal_selesai" placeholder="Tanggal Selesai">
                  <label for="floatingTanggalSelesai">Tanggal Selesai</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->no_sk_penugasan }}" type="text" class="form-control" id="floatingNoSk" name="no_sk_penugasan" placeholder="No. SK Penugasan">
                  <label for="floatingNoSk">No. SK Penugasan</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->tanggal_sk_penugasan }}" type="date" class="form-control" id="floatingTanggalSkPenugasan" name="tanggal_sk_penugasan" placeholder="Tanggal Sk Penugasan">
                  <label for="floatingTanggalSkPenugasan">Tanggal Sk Penugasan</label>
               </div>
            </div>
      
            <div class="col-md-6">
               <div class="form-floating mb-3">
                  <select class="form-select" name="id_jenis_diklat" id="floatingSelect" aria-label="Jenis Diklat">
                     @foreach ($data_jenisDiklat as $jenisDiklat)
                        <option value="{{ $jenisDiklat->id }}" {{ $jenisDiklat->id == $diklat[0]->id_jenis_diklat ? 'selected' : '' }}>{{ $jenisDiklat->nama }}</option>
                     @endforeach
                  </select>
                  <label for="floatingSelect">Jenis Diklat</label>
               </div>
            </div>
      
            <div class="col-md-6">
               <div class="form-floating mb-3">
                  <select class="form-select" name="id_kategori_kegiatan_diklat" id="floatingSelect" aria-label="Jenis Kegiatan Diklat">
                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $diklat[0]->id_kategori ? 'selected' : '' }}>{{ $category->name }}</option>
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
                  <input type="file" class="form-control" id="file_dokumen" name="file_dokumen" placeholder="No. SK Penugasan">
                  <label for="file_dokumen">File</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->nama_dokumen }}" type="text" class="form-control" id="floatingNoSk" name="nama_dokumen" placeholder="No. SK Penugasan">
                  <label for="floatingNoSk">Nama Dokumen</label>
               </div>
            </div>
            <div class="col-12">
               <div class="form-floating">
                  <input value="{{ $diklat[0]->link_dokumen }}" type="text" class="form-control" id="floatingNoSk" name="link_dokumen" placeholder="No. SK Penugasan">
                  <label for="floatingNoSk">Link Dokumen ( Optional )</label>
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
         try {
            fetch('{{ $diklat[0]->file_dokumen }}')
               .then(data => data.blob())
               .then(file => {
                  const dataTr = new DataTransfer()
                  const imgFile = new File([file], '{{ $diklat[0]->file_dokumen }}'.replace('{{ url("") . "/dokumen_diklat/" }}', ''), {type: file.type}) 
                  dataTr.items.add(imgFile)
                  document.getElementById('file_dokumen').files = dataTr.files
               })
         } catch (error) {
            console.log(error)
         }
      </script>
   @else
      <h5 class="text-center">Data Diklat Tidak Di Temukan</h5>
   @endif
</main>
@endsection