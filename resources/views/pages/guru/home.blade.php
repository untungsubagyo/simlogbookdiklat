<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com"></script>
   <title>Document</title>
</head>
<body>
   @extends('components.navbar-guru')
   <main class="py-6 mt-32 w-full flex justify-center">
      <div class="container">
         <h1 class="text-3xl font-semibold px-6">
            Selamat Datang {{ $userdata->name }}
         </h1>

         <div class="mt-8 bg-white shadow-lg rounded-lg p-6 flex flex-col">
            @if($dataDiklat->count() > 0)
               <div class="flex justify-between items-center">
                  <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Data Diklat Anda</h2>
                  <div>
                     <a href="{{ route('diklat.edit', $userdata->id) }}" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                     <form class="inline" method="post" action="{{ route("diklat.destroy", $dataDiklat[0]->id) }}">
                     @csrf   
                     @method('DELETE')
                        <button type="submit"
                           class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                           Hapus
                        </button>
                     </form>
                  </div>
               </div>
               <table>
                  <tbody>
                     <tr class="bg-gray-200 border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Nama Diklat</td>
                        <td>: {{ $dataDiklat[0]->nama_diklat }}</td>
                     </tr>
                     <tr class="border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Penyelenggara</td>
                        <td>: {{ $dataDiklat[0]->penyelenggara }}</td>
                     </tr>
                     <tr class="bg-gray-200 border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Tingkatan Diklat</td>
                        <td>: {{ $dataDiklat[0]->tingkatan_diklat }}</td>
                     </tr>
                     <tr class="border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Jumlah Jam</td>
                        <td>: {{ $dataDiklat[0]->jumlah_jam }}</td>
                     </tr>
                     <tr class="bg-gray-200 border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">No Sertifikat</td>
                        <td>: {{ $dataDiklat[0]->no_sertifikat }}</td>
                     </tr>
                     <tr class="border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Tanggal Sertifikat</td>
                        <td>: {{ $dataDiklat[0]->tanggal_sertifikat }}</td>
                     </tr>
                     <tr class="bg-gray-200 border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Tahun Penyelenggara</td>
                        <td>: {{ $dataDiklat[0]->tahun_penyelenggara }}</td>
                     </tr>
                     <tr class="border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Tempat</td>
                        <td>: {{ $dataDiklat[0]->tempat }}</td>
                     </tr>
                     <tr class="bg-gray-200 border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Tanggal Mulai</td>
                        <td>: {{ $dataDiklat[0]->tanggal_mulai }}</td>
                     </tr>
                     <tr class="border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Tanggal Selesai</td>
                        <td>: {{ $dataDiklat[0]->tanggal_selesai }}</td>
                     </tr>
                     <tr class="bg-gray-200 border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">No SK Penugasan</td>
                        <td>: {{ $dataDiklat[0]->no_sk_penugasan }}</td>
                     </tr>
                     <tr class="border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Tanggal SK Penugasan</td>
                        <td>: {{ $dataDiklat[0]->tanggal_sk_penugasan }}</td>
                     </tr>
                     <tr class="bg-gray-200 border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Jenis diklat ( {{ $dataDiklat[0]->jenis_diklat }} )</td>
                        <td>: {{ $dataDiklat[0]->nama_jenis_diklat }}</td>
                     </tr>
                     <tr class="border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4">Kategori kegiatan</td>
                        <td>: {{ $dataDiklat[0]->kategori_kegiatan }}</td>
                     </tr>
                     <tr class="bg-gray-200 border-b border-gray-500 leading-[3]">
                        <td class="font-bold pl-4" style="vertical-align: top;">Document</td>
                        <td class="flex gap-4">
                           <ul>
                              <li>File</li>
                              <li>Nama</li>
                              <li>Keterangan</li>
                           </ul>
                           <ul>
                              <li class="text-nowrap">
                                 : 
                                 <a target="_blank" href="{{ $dataDiklat[0]->file_dokumen }}" class="cursor-pointer text-blue-800 underline">
                                    Lihat
                                 </a>
                              </li>
                              <li class="text-nowrap">
                                 : {{ $dataDiklat[0]->nama_dokumen }}
                              </li>
                              <li class="text-nowrap">
                                 : {{ $dataDiklat[0]->keterangan_dokumen }}
                              </li>
                           </ul>
                        </td>
                     </tr>
                  </tbody>
               </table>
            @else
               <p class="text-center">Record Diklat Kamu Kosong</p>
               <a href="{{ route('diklat.create') }}" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Buat Record</a>
            @endif
         </div>
      </div>
   </main>
</body>
</html>