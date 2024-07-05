<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com"></script>
   <title>Admin Page</title>
</head>
<body>
   @include('components.navbar')
   <div class="p-12 mt-20 w-full flex justify-center">
      <div class="container">
         <h1 class="text-3xl font-semibold">Selamat Datang
            @if (session()->has('username'))
               {{ session('username') }}
            @else
               {{ $username }}
            @endif
         </h1>
   
         <h2 class="text-2xl mt-10">Daftar Diklat Guru</h2>

         <div class="flex flex-col gap-2">
            <div class="group flex flex-col gap-4 mt-4 cursor-pointer shadow-sm transition-shadow duration-200 hover:shadow-lg">
               <div class="flex p-6 justify-between items-center w-full border border-black h-16 rounded-xl">
                  <div>
                     <h2 class="font-semibold text-xl">Nama Guru Nama Guru</h2>
                     <p class="text-sm text-gray-500 italic">0392509805990</p>
                  </div>
   
                  <div class="flex gap-2 text-end text-gray-500 items-center">
                     <div>
                        <p class="text-sm">terakhir di ubah</p>
                        <p class="text-sm">2024-05-19</p>
                     </div>

                     <div class="group-hover:translate-x-2 transition-transform duration-300 w-4 h-4 border-t border-l border-black rotate-[135deg]"></div>
                  </div>
               </div>
            </div>
            
            <div class="group flex flex-col gap-4 mt-4 cursor-pointer shadow-sm transition-shadow duration-200 hover:shadow-lg">
               <div class="flex p-6 justify-between items-center w-full border border-black h-16 rounded-xl">
                  <div>
                     <h2 class="font-semibold text-xl">Nama Guru Nama Guru</h2>
                     <p class="text-sm text-gray-500 italic">0392509805990</p>
                  </div>
   
                  <div class="flex gap-2 text-end text-gray-500 items-center">
                     <div>
                        <p class="text-sm">terakhir di ubah</p>
                        <p class="text-sm">2024-05-19</p>
                     </div>

                     <div class="group-hover:translate-x-2 transition-transform duration-300 w-4 h-4 border-t border-l border-black rotate-[135deg]"></div>
                  </div>
               </div>
            </div>
            
            <div class="group flex flex-col gap-4 mt-4 cursor-pointer shadow-sm transition-shadow duration-200 hover:shadow-lg">
               <div class="flex p-6 justify-between items-center w-full border border-black h-16 rounded-xl">
                  <div>
                     <h2 class="font-semibold text-xl">Nama Guru Nama Guru</h2>
                     <p class="text-sm text-gray-500 italic">0392509805990</p>
                  </div>
   
                  <div class="flex gap-2 text-end text-gray-500 items-center">
                     <div>
                        <p class="text-sm">terakhir di ubah</p>
                        <p class="text-sm">2024-05-19</p>
                     </div>

                     <div class="group-hover:translate-x-2 transition-transform duration-300 w-4 h-4 border-t border-l border-black rotate-[135deg]"></div>
                  </div>
               </div>
            </div>
            
            <div class="group flex flex-col gap-4 mt-4 cursor-pointer shadow-sm transition-shadow duration-200 hover:shadow-lg">
               <div class="flex p-6 justify-between items-center w-full border border-black h-16 rounded-xl">
                  <div>
                     <h2 class="font-semibold text-xl">Nama Guru Nama Guru</h2>
                     <p class="text-sm text-gray-500 italic">0392509805990</p>
                  </div>
   
                  <div class="flex gap-2 text-end text-gray-500 items-center">
                     <div>
                        <p class="text-sm">terakhir di ubah</p>
                        <p class="text-sm">2024-05-19</p>
                     </div>

                     <div class="group-hover:translate-x-2 transition-transform duration-300 w-4 h-4 border-t border-l border-black rotate-[135deg]"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
</html>