@extends('dashboard.master')
@section('content')
<div class="pagetitle">
      <h1>Posts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Posts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
          @csrf
          <div class="col-6">
            <div class="form-group">
              <label for="name">
                Image
              </label>
              <input type="file" name="image" id="image" class="form-control" required>
              <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            <div class="form-group">
              <label for="title">
                Title
              </label>
              <input type="text" name="title" id="title" class="form-control" required>
              <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            <div class="form-group">
              <label for="content">
                Content
              </label>
              <textarea name="content" id="content" cols="30" rows="10" class="form-control tinymce-editor"></textarea>
              <div class="invalid-feedback">Please, enter your name!</div>
            </div>
            <div class="form-group mt-4">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </section>
@endsection
