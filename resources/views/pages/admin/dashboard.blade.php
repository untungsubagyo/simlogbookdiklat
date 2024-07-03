<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
   <title>Document</title>
</head>
<body>
   @include('components.admin.navbar')
   <div class="container">
      <h1>Dashboard</h1>

      <div class="card-container">
         <div class="card">
            <h2>Jenis Diklat</h2>
            <p>Managemen Jenis Diklat</p>
         </div>
         <div class="card">
            <h2>Jenis Dokumen</h2>
            <p>Managemen Jenis Dokumen</p>
         </div>
         <div class="card">
            <h2>Ketegori Kegiatan</h2>
            <p>Managemen Ketegori Kegiatan</p>
         </div>
         <div class="card">
            <h2>Golongan Guru</h2>
            <p>Managemen Golongan Guru</p>
         </div>
      </div>
   </div>
</body>
</html>