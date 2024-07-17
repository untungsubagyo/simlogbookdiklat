
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Jenis Dokumen</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <form action="{{route('jenis_dokumen.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Jenis Dokumen</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$jenis_dokumen->name}}" readonly>
                <div>
                    <div class="form-group mt-4">
                        <a href="{{route('jenis_dokumen.index')}}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</section>
