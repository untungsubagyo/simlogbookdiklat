<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com" defer></script>
   <style>
      /* Basic styles for file explorer */
      ul {
         list-style-type: none;
         padding-left: 20px;
      }
      .category {
         cursor: pointer;
         padding: 5px;
      }
      .category:hover {
         background-color: #ddd;
      }
      .selected {
         background-color: #aaa;
      }
   </style>
   <title>Document</title>
</head>
<body>
   @extends('components.navbar-guru')
   <main class="py-6 px-4 mt-32 w-full flex justify-center">
      <div class="container">
         @if ($data->count() > 0)
            <h1 class="text-center text-3xl mb-8">Edit Data Diklat</h1>

            <form action="{{ route('diklat.update', $data[0]->id) }}" method="POST" class="mx-auto">
               @csrf
               @method('PUT')
               <div class="mb-4">
                  <label for="nama_diklat" class="block text-gray-700 text-sm font-bold mb-2">Nama Diklat:</label>
                  <input type="text" name="nama_diklat" id="nama_diklat" value="{{ $data[0]->nama_diklat }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="penyelenggara" class="block text-gray-700 text-sm font-bold mb-2">Penyelenggara:</label>
                  <input type="text" name="penyelenggara" id="penyelenggara" value="{{ $data[0]->penyelenggara }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="tingkatan_diklat" class="block text-gray-700 text-sm font-bold mb-2">Tingkatan Diklat:</label>
                  <input type="text" name="tingkatan_diklat" id="tingkatan_diklat" value="{{ $data[0]->tingkatan_diklat }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="jumlah_jam" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Jam:</label>
                  <input type="text" name="jumlah_jam" id="jumlah_jam" value="{{ $data[0]->jumlah_jam }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="no_sertifikat" class="block text-gray-700 text-sm font-bold mb-2">No. Sertifikat:</label>
                  <input type="text" name="no_sertifikat" id="no_sertifikat" value="{{ $data[0]->no_sertifikat }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="tanggal_sertifikat" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Sertifikat:</label>
                  <input type="date" name="tanggal_sertifikat" id="tanggal_sertifikat" value="{{ $data[0]->tanggal_sertifikat }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="tahun_penyelenggara" class="block text-gray-700 text-sm font-bold mb-2">Tahun Penyelenggara:</label>
                  <input type="text" name="tahun_penyelenggara" id="tahun_penyelenggara" value="{{ $data[0]->tahun_penyelenggara }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="tempat" class="block text-gray-700 text-sm font-bold mb-2">Tempat:</label>
                  <input type="text" name="tempat" id="tempat" value="{{ $data[0]->tempat }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="tanggal_mulai" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai:</label>
                  <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ $data[0]->tanggal_mulai }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="tanggal_selesai" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Selesai:</label>
                  <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ $data[0]->tanggal_selesai }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="no_sk_penugasan" class="block text-gray-700 text-sm font-bold mb-2">No. SK Penugasan:</label>
                  <input type="text" name="no_sk_penugasan" id="no_sk_penugasan" value="{{ $data[0]->no_sk_penugasan }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="tanggal_sk_penugasan" class="block text-gray-700 text-sm font-bold mb-2">Tanggal SK Penugasan:</label>
                  <input type="date" name="tanggal_sk_penugasan" id="tanggal_sk_penugasan" value="{{ $data[0]->tanggal_sk_penugasan }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </div>
               <div class="mb-4">
                  <label for="id_jenis_diklat" class="block text-gray-700 text-sm font-bold mb-2">Jenis Diklat:</label>
                  <select name="id_jenis_diklat" id="id_jenis_diklat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                     <option value="null">-- Pilih Jenis --</option>
                     @foreach ($data_jenisDiklat as $jenisDiklat)
                        <option value="{{ $jenisDiklat->id }}" {!! ($jenisDiklat->id == $data[0]->id_jenis_diklat) ? 'selected' : '' !!}>{{ $jenisDiklat->nama }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="mb-4">
                  <label for="id_kategori_kegiatan_diklat" class="block text-gray-700 text-sm font-bold mb-2">Kategori Kegiatan:</label>
                  <select name="id_kategori_kegiatan_diklat" id="id_kategori_kegiatan_diklat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline cursor-pointer">
                     <option value="null">-- Pilih Jenis --</option>
                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $data[0]->id_kategori_kegiatan_diklat ? 'selected' : '' }}>{{ $category->name }}</option>
                     @endforeach
                  </select>
               </div>

               <fieldset class="mb-4 border border-gray-500 p-4 rounded-lg">
                  <legend class="px-2 ml-2">Dokumen</legend>   

                  <label for="file_dokumen" class="block text-gray-700 text-sm font-bold mb-2">File:</label>
                  <input type="file" accept=".pdf,.doc,.html" name="file_dokumen" id="file_dokumen" class="cursor-pointer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  
                  <label for="nama_dokumen" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Nama:</label>
                  <input type="text" name="nama_dokumen" id="nama_dokumen" value="{{ $data[0]->nama_dokumen }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  
                  <label for="link_dokumen" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Link Dokumen (Optional):</label>
                  <input type="text" name="link_dokumen" id="link_dokumen" value="{{ $data[0]->link_dokumen }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  
                  <label for="keterangan_dokumen" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Keterangan:</label>
                  <input type="text" name="keterangan_dokumen" id="keterangan_dokumen" value="{{ $data[0]->keterangan_dokumen }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               </fieldset>
               
               <div class="flex items-center justify-between">
                  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
               </div>
            </form>
         @else
            <h1 class="text-center mt-4">Tidak Bisa Mengedit Data, Karena Belum Ada Record Yang Tercatat</h1>
         @endif
      </div>
   </main>

   <script>
      /** @type {HTMLInputElement} */
      const inputFile = document.getElementById('file_dokumen')
      try {
         fetch('{{ $data[0]->file_dokumen }}')
            .then(data => data.blob())
            .then(file => {
               const dataTr = new DataTransfer()
               const imgFile = new File([file], '{{ $data[0]->file_dokumen }}', {type: file.type}) 
               dataTr.items.add(imgFile)
               inputFile.files = dataTr.files
            })
      } catch (error) {
         console.log(error)
      }
   </script>
</body>
</html>