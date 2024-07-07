<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('assets/css/diklat/index.css') }}">
   <title>Diklat Guru</title>
</head>
<body>
   @extends('components.navbar')
    <main> 
        <ol>
            <li><a href="{{ route('golongan_guru.index') }}">GOLONGAN</a></li>
            <li>GURU</li>
        </ol>
    </main>
{{-- <div class="pagetitle"> --}}
<section class="section dashboard">
  {{-- <div class="row">
      <div class="col-1">
          <div class="row"> --}}
              <a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah</a>
          {{-- </div>
      </div> --}}

      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      <table class="table table-borderless datatable">
          <thead>
              <tr>
                  {{-- <th>No</th> --}}
                  <th>NIP</th>
                  <th>Golongan</th>
                  <th>User</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($datas as $data)
                  <tr>
                      {{-- <td>{{ $data+1 }}</td> --}}
                      <td>{{ $data->NIP }}</td>
                      <td>{{ $data->golongan }}</td>
                      <td>{{ $data->user_id }}</td>
                      <td>
                          <form onsubmit="return confirm('Apakah Anda yakin?')" action="{{ route('guru.destroy', $data->id) }}" method="POST">
                              <a href="{{ route('guru.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Hapus</button>
                          </form>
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="3" class="text-center alert alert-danger">Data Kategori masih Kosong</td>
                  </tr>
              @endforelse
          </tbody>
      </table>
  {{-- </div> --}}
</section>
</body>
</html>
