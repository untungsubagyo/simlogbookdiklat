<nav class="navbar">
   <style>
      .navbar {
         box-sizing: border-box;
         font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
         top: 0;
         left: 0;
         position: fixed;
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding: 1.5rem 3rem;
         background-color: #323232;
         color: white;
         width: 100%;
      }

      .navbar * {
         list-style-type: none;
         text-decoration: none;
         appearance: none;
         box-sizing: border-box;
         padding: 0;
         margin: 0;
      }

      .navbar h1 {
         font-weight: 300;
      }

      .navbar>a {
         padding: .5rem 1.5rem;
         border-radius: .5rem;
         border: solid red 2px;
         color: red;
         cursor: pointer;
         background: transparent;

         transition: background .2s ease-in-out, color .2s ease-in-out;
      }

      .navbar button:hover {
         background: red;
         color: white;
      }

      .navbar ul li a {
         color: rgb(189, 189, 189);
         transition: color .2s ease-in-out;
      }

      .navbar ul li a:hover {
         color: white;
      }

      .navbar ul {
         display: flex;
         gap: 2rem;
      }
   </style>
   <h1>Logbook App</h1>
   <ul>
      <li><a class="text-decoration-none text-body-emphasis" href="{{ route('diklat.index') }}">Diklat</a></li>
      <li><a class="text-decoration-none text-body-emphasis" href="/">Golongan Guru</a></li>
      <li><a class="text-decoration-none text-body-emphasis" href="{{ route('jenis_diklat.index') }}">Jenis Diklat</a></li>
      <li><a class="text-decoration-none text-body-emphasis" href="/services">Jenis Dokumen</a></li>
      <li><a class="text-decoration-none text-body-emphasis" href="/contact">Kategori Kegiatan</a></li>
   </ul>
   <a href="{{ route('logout') }}">Logout</a>
   <!-- <div>
      <div style="width: 3rem; height: 3rem; border-radius: 50%" class="bg-secondary"></div>
   </div> -->
</nav>