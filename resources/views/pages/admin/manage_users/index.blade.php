@extends('layouts.root-layout')
    @section('content')
    <div class="pagetitle">
            <h1>Daftar Pengguna</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Daftar Pengguna</li>
                </ol>
            </nav>
        </div>

        <section class="section guru">
            <div class="col-lg-12">
                <a href="{{ route('manage_users.create') }}" class="btn btn-primary">Tambah</a>
            </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table datatable table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto Profil</th>
                <th>Nama Lengkap</th>
                <th>Username/NIP</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usersData as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($user->profile_photo)
                            <img src="{{ Storage::url($user->profile_photo) }}" alt="Profile Photo" width="50">
                        @else
                            <span>No Photo</span>
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('manage_users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $user->id }}')">Delete</button>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('manage_users.destroy', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="{{ route('manage_users.show', $user->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
        }
    </script>
        </section>
    @endsection
{{-- </body>
</html> --}}
