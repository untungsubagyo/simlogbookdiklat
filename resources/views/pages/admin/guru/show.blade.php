@extends('dashboard.master')
@section('content')
<div class="pagetitle">
      <h1>Guru</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Guru</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        
        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
          @csrf
          <div class="col-6">
            <div class="form-group">
              <label for="name">
                Image
              </label>
              <img src="/storage/posts/{{ $posts->image }}" alt="" class="form-control">
              {{-- <input type="file" name="image" id="image" class="form-control" value="{{ $posts->image }}" readonly> --}}
              <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            <div class="form-group">
              <label for="title">
                Title
              </label>
              <input type="text" name="title" id="title" class="form-control" value="{{ $posts->title }}" readonly>
              <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            <div class="form-group">
              <label for="content">
                Content
              </label>
              <textarea name="content" id="content" cols="30" rows="10" class="form-control tinymce-editor" readonly>
                {{ $posts->content }}
              </textarea>
              <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            <div class="form-group mt-4">
              <a href="{{ route('posts.index') }}" class="btn btn-primary">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </section>
@endsection
