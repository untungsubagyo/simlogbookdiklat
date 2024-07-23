<aside id="sidebar" class="sidebar">
   <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
         <a class="nav-link {{ Route::getCurrentRoute()->getName() == 'homePageGuru' ? 'active' : 'collapsed' }}" href="{{ route('homePageGuru') }}">
            <i class="bi bi-grid"></i>
            <span>Beranda</span>
         </a>
      </li>

      <li class="nav-item">
         <a 
            class="nav-link {{ Route::getCurrentRoute()->getName() == 'diklat.create' ? 'active' : 'collapsed' }}" 
            style="pointer-events: {{ isset($isActivateUser) ? ($isActivateUser ? 'all' : 'none') : ''}} !important; color: {{ isset($isActivateUser) ? ($isActivateUser ? '' : '#b3b3b3bf') : '' }}" 
            href="{{ route('diklat.create') }}"
         >
            <i class="bi bi-person"></i>
            <span>Tambah Diklat</span>
         </a>
      </li>
   </ul>
</aside>