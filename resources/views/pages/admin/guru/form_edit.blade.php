{{-- @extends('dashboard.master')
@section('content') --}}
<div class="pagetitle">
      <h1>Kategory</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Kategory</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">

        
        <form action="{{ route('guru.update', $guru->id) }}" enctype="multipart/form-data" method="POST" class="row g-3 needs-validation" novalidate>
          @csrf
          @method('PUT')
          <div class="col-6">
            <div class="form-group">
              <label for="image">
                Image
              </label>
              <input type="file" name="image" id="image" class="form-control" value="{{ $posts->image }}" required>
              <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            <div class="form-group">
              <label for="title">
                Title
              </label>
              <input type="text" name="title" id="title" class="form-control" value="{{ $posts->title }}" required>
              <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            <div class="form-group">
              <label for="content">
                Content
              </label>
              <textarea name="content" id="content" cols="30" rows="10" class="form-control tinymce-editor" required>
                {{ $posts->content }}
              </textarea>
              <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            <div class="form-group mt-4">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </section>
    <script>
      window.addEventListener('load', () => {
         /** @type {HTMLInputElement} */
         const image = document.getElementById('image')
         try {
            fetch('/storage/posts/{{ $posts->image }}').then(data => {
               return data.blob()
            }).then(img => {
               const dataTr = new DataTransfer()
               const imgFile = new File([img], '{{ $posts->image }}') 
               dataTr.items.add(imgFile)
               image.files = dataTr.files
            })
         } catch (error) {
            console.log(error)
         }
      })
   </script>
{{-- @endsection --}}
