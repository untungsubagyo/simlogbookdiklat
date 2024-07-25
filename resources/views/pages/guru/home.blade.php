@extends('layouts.root-layout')

@section('sidebar')
   @include('pages.guru.sidebar')
@endsection

@section('content')
   <div class="pagetitle">
		<h1>Beranda</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">Beranda</li>
			</ol>
		</nav>
	</div>

   @if (Session('message'))
      <div class="alert alert-success">{{ Session('message') }}</div>
   @endif

   <main class="py-6 mt-32 w-full flex justify-center">
      <h1 class="text-3xl font-semibold px-6">
         Selamat Datang 
         <strong>{{ $userdata->name }}</strong>
      </h1>

      <h3 class="mt-5 mb-3">Data Diklat Anda</h3>
      <div class="col">
         @forelse ($dataDiklat as $index => $diklat)
            <div lass="w-100">
               <div class="card p-2">
                  <div class="card-body">
                     <h5 style="line-height: .3rem" class="card-title">
                        Data Diklat : {{ $diklat->nama_diklat }}
                     </h5>
                     <p style="line-height: .3rem" class="mb-4 text-black-50">nomor sertifikat : {{ $diklat->no_sertifikat }}</p>
                     <div style="display: flex; justify-content: space-between; align-items: flex-end">
                        <div>
                           <a href="{{ route('diklat.show', $diklat->id) }}" class="btn btn-primary">Lihat</a>
                           <a href="{{ route('diklat.edit', $diklat->id) }}" class="btn btn-warning">Edit</a>
                           <button onclick="confirmDelete('{{ $diklat->id }}')" class="btn btn-danger">Hapus</button>
                           <form method="post" action="{{ route('diklat.destroy', $diklat->id) }}" id="delete-form-{{ $diklat->id }}">
                              @csrf
                              @method('delete')
                           </form>
                        </div>
                        <p class="text-black-50">
                           Terakhir Diubah
                           <span> | {{ $diklat->updated_at }}</span>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <script>
               function confirmDelete(id) {
                  Swal.fire({
                     title: 'Apakah Anda yakin?',
                     text: "Anda tidak akan dapat mengembalikan ini!",
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Ya, hapus!',
                     cancelButtonText: 'Batal'
                  }).then((result) => {
                     if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                     }
                  });
               };
            </script>
         @empty
            @if ($isActivateUser)
               <p class="text-center">
                  Belum Ada Data Yang Tercatat silahkan 
                  <a href="{{ route('diklat.create') }}" style="text-decoration: underline">tambah</a>
                  data diklat <br> anda terlebih dahulu
               </p>
            @else
               <p class="text-center">
                  Anda <strong>tidak dapat melihat atau menambahkan data diklat</strong>, karena akun anda belum teraktivasi
               </p>
            @endif
         @endforelse
      </div>
   </main>
@endsection