<div class="pagetitle">
      <h1>Golongan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Golongan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">

        <div class="col-1">
          <div class="row">
            <a href="{{ route('golongan.create') }}" class="btn btn-primary">Tambah</a>
          </div>
        </div>
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        <table class="table-borderless datatable">
          <thead>
            <tr>
              <th>Golongan</th>
              <th>Pangkat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($datas as $data)
              <tr>
                <td>{{ $data->name }}</td>
                <td>
                  <form onsubmit="return confirm('Apakah Anda yakin?')" action="{{ route('post_category.destroy', $data->id) }}" method="POST">
                    <a href="{{ route('golongan.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
               <div class="alert alert-danger">Data Kategori masih Kosong</div> 
            @endforelse
          </tbody>
        </table>
      </div>
    </section>