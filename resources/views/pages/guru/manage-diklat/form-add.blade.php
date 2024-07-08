<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com" defer></script>
   <title>Buat Diklat Record</title>
</head>
<body>
   @extends('components.navbar-guru')
   <main class="py-8 px-4 mt-28 w-full flex justify-center">
      <div class="container">
         <h1 class="text-center text-3xl mb-8">Buat Diklat Record</h1>
         <form action="{{ route('diklat.store') }}" method="POST"  enctype="multipart/form-data" class="mx-auto">
            @csrf
            <div class="mb-4">
               <label for="nama_diklat" class="block text-gray-700 text-sm font-bold mb-2">Nama Diklat:</label>
               <input type="text" name="nama_diklat" id="nama_diklat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="penyelenggara" class="block text-gray-700 text-sm font-bold mb-2">Penyelenggara:</label>
               <input type="text" name="penyelenggara" id="penyelenggara" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="tingkatan_diklat" class="block text-gray-700 text-sm font-bold mb-2">Tingkatan Diklat:</label>
               <input type="text" name="tingkatan_diklat" id="tingkatan_diklat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="jumlah_jam" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Jam:</label>
               <input type="number" name="jumlah_jam" id="jumlah_jam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="no_sertifikat" class="block text-gray-700 text-sm font-bold mb-2">No. Sertifikat:</label>
               <input type="text" name="no_sertifikat" id="no_sertifikat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="tanggal_sertifikat" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Sertifikat:</label>
               <input type="date" name="tanggal_sertifikat" id="tanggal_sertifikat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="tahun_penyelenggara" class="block text-gray-700 text-sm font-bold mb-2">Tahun Penyelenggara:</label>
               <input type="text" name="tahun_penyelenggara" id="tahun_penyelenggara" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="tempat" class="block text-gray-700 text-sm font-bold mb-2">Tempat:</label>
               <input type="text" name="tempat" id="tempat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="tanggal_mulai" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai:</label>
               <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="tanggal_selesai" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Selesai:</label>
               <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="no_sk_penugasan" class="block text-gray-700 text-sm font-bold mb-2">No. SK Penugasan:</label>
               <input type="text" name="no_sk_penugasan" id="no_sk_penugasan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="tanggal_sk_penugasan" class="block text-gray-700 text-sm font-bold mb-2">Tanggal SK Penugasan:</label>
               <input type="date" name="tanggal_sk_penugasan" id="tanggal_sk_penugasan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
               <label for="id_jenis_diklat" class="block text-gray-700 text-sm font-bold mb-2">Jenis Diklat:</label>
               <select name="id_jenis_diklat" id="id_jenis_diklat" class="cursor-pointer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  <option value="null">-- Pilih Jenis --</option>
                  @foreach ($data_jenisDiklat as $jenisDiklat)
                     <option value="{{ $jenisDiklat->id }}">{{ $jenisDiklat->nama }}</option>
                  @endforeach
               </select>
            </div>
            <div class="mb-4">
               <label for="id_kategori_kegiatan_diklat" class="block text-gray-700 text-sm font-bold mb-2">Kategori Kegiatan:</label>
               <select name="id_kategori_kegiatan_diklat" id="id_kategori_kegiatan_diklat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline cursor-pointer">
                  <option value="null">-- Pilih Jenis --</option>
                  @foreach ($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
               </select>
            </div>
            <fieldset class="mb-4 border border-gray-500 p-4 rounded-lg">
               <legend class="px-2 ml-2">Dokumen</legend>   

               <label for="file_dokumen" class="block text-gray-700 text-sm font-bold mb-2">File:</label>
               <input type="file" accept=".pdf,.doc,.html" name="file_dokumen" id="file_dokumen" class="cursor-pointer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

               <label for="nama_dokumen" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Nama:</label>
               <input type="text" name="nama_dokumen" id="nama_dokumen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

               <label for="link_dokumen" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Link Dokumen (Optional):</label>
               <input type="text" name="link_dokumen" id="link_dokumen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

               <label for="keterangan_dokumen" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Keterangan:</label>
               <input type="text" name="keterangan_dokumen" id="keterangan_dokumen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </fieldset>
            <div class="flex items-center justify-between">
               <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>
         </form>
      </div>
   </main>
</body>
</html>