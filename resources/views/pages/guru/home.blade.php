<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   @extends('components.navbar')
   <main style="margin-top: 6rem;">
      @if (session()->has('username'))
         <h1>Selamat Datang {{ session('username') }}</h1>
      @endif
   </main>
</body>
</html>