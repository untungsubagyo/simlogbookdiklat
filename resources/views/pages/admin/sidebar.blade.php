<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ $menu == 'dashboard' ? 'active' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ $menu == 'manage_guru' ? 'active' : 'collapsed' }}"
                href="{{ route('manage_guru.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Guru</span>
            </a>
        </li><!-- End Guru Page Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ $menu == 'dokumen_diklat' ? 'active' : 'collapsed' }}"
                href="{{ route('dokumen_diklat.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Dokumen Diklat</span>
            </a>
        </li><!-- End Document Diklats Page Nav -->


        <li class="nav-item">
            <a class="nav-link  {{ $menu == 'golongan' ? 'active' : 'collapsed' }}"
                href="{{ route('golongan_guru.index') }}">
                <i class="bi bi-person"></i>
                <span>Pangkat & Golongan</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ $menu == 'jenis_diklat' ? 'active' : 'collapsed' }}"
                href="{{ route('jenis_diklat.index') }}">
                <i class="bi bi-question-circle"></i>
                <span>Jenis Diklat</span>
            </a>
        </li><!-- End Jenis Diklat Page Nav -->

        
        <li class="nav-item">
            <a class="nav-link  {{ $menu == 'jenis_dokumen' ? 'active' : 'collapsed' }}"
                href="{{ route('jenis_dokumen.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Jenis Dokumen</span>
            </a>
        </li><!-- End Document Jenis Page Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ $menu == 'kategori_kegiatan' ? 'active' : 'collapsed' }}"
                href="{{ route('kategori_kegiatan.index') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Kategori Kegiatan</span>
            </a>
        </li><!-- End Kategori Kegiatan Page Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ $menu == 'manage_users' ? 'active' : 'collapsed' }}"
                href="{{ route('manage_users.index') }}">
                <i class="bi bi-envelope"></i>
                <span>Pengguna</span>
            </a>
        </li><!-- End Pengguna Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
