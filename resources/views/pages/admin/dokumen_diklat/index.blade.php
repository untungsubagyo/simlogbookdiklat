<div class="pagetitle">
    <h1>Dokumen Diklat</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Dokumen Diklat</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">

        <div class="col-2">
            <div class="row">
                <a href="{{ route('dokumen_diklat.create')}}" class="btn btn-primary">Tambah</a>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif

        <table class="table-borderless datatable">
            <thead>
                <tr>
                    <th>File</th>
                    <th>Nama Diklat</th>
                    <th>Keterangan</th>
                    <th>Jenis Dokumen</th>
                    <th>Tautan Dokumen</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td>{{$data->file}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->note}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->link}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda yakin?')" action="{{route('dokumen_diklat.destroy', $data->id)}}" method="POST">
                                <a href="{{route('dokumen_diklat.show', $data->id)}}" class="btn btn-dark">Show</a>
                                <a href="{{route('dokumen_diklat.edit', $data->id)}}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">Data Dokumen masih kosong.</div>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
