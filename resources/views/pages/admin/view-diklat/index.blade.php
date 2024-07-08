<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com"></script>
   <title>Data Diklat {{ $dataDiklat[0]->username }}</title>
</head>
<body>
   @extends('components.navbar')
   <main class="py-6 mt-32 w-full flex justify-center">
      <div class="container">
         <div class="mt-8 bg-white shadow-lg rounded-lg p-6 flex flex-col">
            <div class="flex justify-between items-center">
               <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">
                  Data Diklat 
                  <span class="text-green-700">
                     {{ $dataDiklat[0]->username }}
                  </span>
               </h2>
               <div>
                  <a href="/admin" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
                  <a 
                     onclick="(function () {
                        if (confirm('Anda Yakin Akan Menghapus Data Ini ?')) {
                           return window.location.href = '{{ route('diklat.destroy', $dataDiklat[0]->id) }}'
                        }
                     })()" 
                     class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                     Hapus
                  </a>
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
                              : {{ $dataDiklat[0]->dokumen_file }}
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
         </div>
      </div>
   </main>
</body>
</html>