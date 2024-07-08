<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dokumen Diklat</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <form action="{{route('dokumen_diklat.store')}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-6">
                <div class="form-group">
                    <label for="name">File</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                    <div class="invalid-feedback">Please, input File of Diklat Document!</div>
                <div>
                <div class="form-group">
                    <label for="name">Nama Diklat</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                    <div class="invalid-feedback">Please, enter the Name of Diklat Document!</div>
                <div>
                    <div class="form-group">
                        <label for="content">Keterangan</label>
                        <textarea name="note" id="note" cols="30" rows="6" class="form-control"></textarea>
                        <div class="invalid-feedback">Please, enter the description!</div>
                    <div>
                        <div class="form-group">
                            <label for="content">Jenis Dokumen</label>
                            <textarea name="note" id="note" cols="30" rows="6" class="form-control"></textarea>
                            <div class="invalid-feedback">Please, choose!</div>
                        <div>
                            <div class="form-group">
                                <label for="name">Tautan</label>
                                <input type="text" name="link" id="link" class="form-control" required>
                                <div class="invalid-feedback">Please, enter link of Diklat Document!</div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</section>
