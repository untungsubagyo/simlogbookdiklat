@extends('layouts.root-layout')

@section('sidebar')
@extends('pages.guru.sidebar')
@endsection

@section('content')
<div class="pagetitle">
   <h1>Detail Diklat</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('homePageGuru') }}">Beranda</a></li>
         <li class="breadcrumb-item active">Detail Diklat</li>
      </ol>
   </nav>
</div>
<div class="card">
   @if ($dataDiklat->count() > 0)
      <div class="card-header">
         <h3>Informasi Diklat <strong>{{ $dataDiklat[0]->nama_diklat }}</strong></h3>
      </div>
      <div class="card-body">
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Nama Diklat</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->nama_diklat }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Penyelenggara</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->penyelenggara }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Tingkatan Diklat</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->tingkatan_diklat }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Jumlah Jam</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->jumlah_jam }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>No Sertifikat</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->no_sertifikat }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Tanggal Sertifikat</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->tanggal_sertifikat }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Tahun Penyelenggara</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->tahun_penyelenggara }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Tempat</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->tempat }} </div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Tanggal Mulai</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->tanggal_mulai }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Tanggal Selesai</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->tanggal_selesai }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>No SK Penugasan</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->no_sk_penugasan }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Tanggal SK Penugasan</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->tanggal_sk_penugasan }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Jenis Diklat ( {{ $dataDiklat[0]->jenis_diklat }} )</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->nama_jenis_diklat }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Kategori Kegiatan</strong></div>
            <div class="col-sm-8">: {{ $dataDiklat[0]->kategori_kegiatan }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Document</strong></div>
            <div class="col-sm-8" style="display: flex; gap: 1rem;">
               <ul style="list-style-type: none; padding: 0;">
                  <li>
                     <strong>File</strong>   
                  </li>
                  <li>
                     <strong>Link</strong>   
                  </li>
                  <li>
                     <strong>Nama</strong>   
                  </li>
                  <li>
                     <strong>Keterangan</strong>   
                  </li>
               </ul>
               <ul style="list-style-type: none; padding: 0;">
                  @if (isset($dataDiklat[0]->file_dokumen))
                     <li>: <a target="_blank" href="{{ $dataDiklat[0]->file_dokumen }}">lihat</a></li>
                  @else
                     <li>: -</li>
                  @endif
                  @if (isset($dataDiklat[0]->link_dokumen))
                     <li>: <a target="_blank" href="{{ $dataDiklat[0]->link_dokumen }}">{{ $dataDiklat[0]->link_dokumen }}</a></li>
                  @else
                     <li>: -</li>
                  @endif
                  <li>: {{ $dataDiklat[0]->nama_dokumen }}</li>
                  
                  @if (isset($dataDiklat[0]->keterangan_dokumen))
                     <li>: {{ $dataDiklat[0]->keterangan_dokumen }}</li>
                  @else
                     <li>: -</li>
                  @endif
               </ul>
            </div>
         </div>
      </div>
   @else
      <h5 class="text-center p-4">Data Diklat Tidak Di Temukan</h5>
   @endif
</div>
@endsection