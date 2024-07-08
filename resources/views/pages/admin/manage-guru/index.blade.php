<section class="section dashboard" style="margin-top: 8rem;">
    <div class="row">
        {{-- dlgk,gl --}}
        <div class="col-1">
            <div class="row">
                <a href="{{ route('manage_guru.create') }}" class="btn btn-primary">Tambah</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-borderless datatable">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Golongan</th>
                    <th>User Id</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td>{{ $data->NIP }}</td>
                        <td>{{ $data->golongan }}</td>
                        <td>{{ $data->user_id }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda yakin?')"
                                action="{{ route('manage_guru.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('manage_guru.edit', $data->id) }}" class="btn btn-warning">Edit</a>
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
    </div>
</section>