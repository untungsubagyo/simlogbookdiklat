<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Route::getCurrentRoute()->uri == 'admin' ? 'active' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ str_contains(Route::getCurrentRoute()->uri, 'admin/manage_guru') ? 'active' : 'collapsed' }}"
                href="{{ route('manage_guru.index') }}">
                <i class="bi-people"></i>
                <span>Guru</span>
            </a>
        </li><!-- End Guru Page Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ str_contains(Route::getCurrentRoute()->uri, 'admin/jenis_dokumen') ? 'active' : 'collapsed' }}"
                href="{{ route('jenis_dokumen.index') }}">
                <i class="bi-file-earmark-text"></i>
                <span>Jenis Dokumen</span>
            </a>
        </li><!-- End Document jenis Page Nav -->

        
        <li class="nav-item">
            <a class="nav-link  {{ str_contains(Route::getCurrentRoute()->uri, 'admin/jenis_diklat') ? 'active' : 'collapsed' }}"
                href="{{ route('jenis_diklat.index') }}">
                <i class="bi-files"></i>    
                <span>Jenis Diklat</span>
            </a>
        </li><!-- End Jenis Diklat Page Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ str_contains(Route::getCurrentRoute()->uri, 'admin/golongan_guru') ? 'active' : 'collapsed' }}"
                href="{{ route('golongan_guru.index') }}">
                <i class="bi-view-stacked"></i>
                <span>Pangkat & Golongan</span>
            </a>
        </li><!-- End Pangkat Gol Page Nav -->


        <li class="nav-item">
            <a class="nav-link  {{ str_contains(Route::getCurrentRoute()->uri, 'admin/kategori_kegiatan') ? 'active' : 'collapsed' }}"
                href="{{ route('kategori_kegiatan.index') }}">
                <i class="bi-tags"></i>
                <span>Kategori Kegiatan</span>
            </a>
        </li><!-- End Kategori Kegiatan Page Nav -->


        <li class="nav-item">
            <a class="nav-link  {{ str_contains(Route::getCurrentRoute()->uri, 'admin/manage_users') ? 'active' : 'collapsed' }}"
                href="{{ route('manage_users.index') }}">
                <i class="bi-person"></i>
                <span>Pengguna</span>
            </a>
        </li><!-- End Pengguna Page Nav -->
    </ul>

</aside><!-- End Sidebar-->