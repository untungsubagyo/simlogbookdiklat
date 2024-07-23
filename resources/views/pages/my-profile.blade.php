@extends('layouts.root-layout')

@if (Auth::user()->role_id == 2)
   @section('sidebar')
      @extends('pages.guru.sidebar')
   @endsection
@endif

@section('content')
<div class="pagetitle">
   <h1>Profil Saya</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item active">Profile Saya</li>
      </ol>
   </nav>
</div>

@if ($errors->any())
   <ul class="alert alert-danger" style="padding-left: 2rem;">
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
   </ul>
@endif

<div class="row">
   @if (Session('message'))
      <div class="alert alert-success">{{ Session('message') }}</div>
   @endif
   <div class="col-xl-4">
      <div class="card">
         <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @if (isset($dataProfile->profile_photo))
               <img src="{{ Storage::url($dataProfile->profile_photo) }}"
                  style="width: 8rem; height: 8rem; object-fit: cover;" alt="Profile" class="rounded-circle">
            @else
               <div
                  style="width: 8rem; height: 8rem; border-radius: 50%; background-color: gray; text-align: center; line-height: 8rem; font-size: 1.8rem; color: white">
                  {{ substr(Auth::user()->name, 0, 2) }}
               </div>
            @endif

            <h2>{{ $dataProfile->name }}</h2>
            <p>{{ $dataProfile->email }}</p>
         </div>
      </div>
   </div>

   <div class="col-xl-8">
      <div class="card">
         <div class="card-body pt-3">
            <ul class="nav nav-tabs nav-tabs-bordered">
               <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                     data-bs-target="#profile-overview">Overview</button>
               </li>
               <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
               </li>
            </ul>
            <div class="tab-content pt-2">
               <div class="tab-pane fade profile-overview {{ $errors->any() ? '' : 'show active' }}" id="profile-overview">
                  <h5 class="card-title">Detail Profil</h5>

                  <div class="row mb-2">
                     <div class="col-lg-3 col-md-4 label fw-bold">Nama</div>
                     <div class="col-lg-9 col-md-8">{{ $dataProfile->name }}</div>
                  </div>

                  <div class="row mb-2">
                     <div class="col-lg-3 col-md-4 label fw-bold">Email</div>
                     <div class="col-lg-9 col-md-8">{{ $dataProfile->email }}</div>
                  </div>

                  <div class="row mb-2">
                     <div class="col-lg-3 col-md-4 label fw-bold">Tipe Akun</div>
                     <div class="col-lg-9 col-md-8">{{ $dataProfile->role_id == 1 ? 'Admin' : 'Guru' }}</div>
                  </div>

                  @if (($dataProfile->role_id == 2) && $isActivateUser)
                     <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label fw-bold">NIP</div>
                        <div class="col-lg-9 col-md-8">{{ $dataGuru[0]->NIP }}</div>
                     </div>
                     <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label fw-bold">Golongan</div>
                        <div class="col-lg-9 col-md-8">{{ $dataGuru[0]->golongan }}</div>
                     </div>
                     <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label fw-bold">Pangkat</div>
                        <div class="col-lg-9 col-md-8">{{ $dataGuru[0]->pangkat }}</div>
                     </div>
                  @endif
               </div>

               <div class="tab-pane fade profile-edit pt-3 {{ $errors->any() ? 'show active' : '' }}" id="profile-edit">
                  <form action="{{ route('my_profile.update') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('put')
                     <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                           <div id="trigger-input-img"
                              style="cursor: pointer; width: 8rem; height: 8rem; background-color: gray; text-align: center; line-height: 8rem; color: white">
                              <input hidden type="file" name="profile_photo" id="input-img"
                                 accept=".png,.jpg,.jpeg,.webp">
                              <input hidden type="text" value="false" name="request-del-profile"
                                 id="request-del-profile">
                              <img id="img-preview" src="{{ Storage::url($dataProfile->profile_photo) }}"
                                 style="width: 8rem; height: 8rem; object-fit: cover;" alt="Profile">
                              <span id="fallback-text">upload photo</span>
                           </div>

                           <div class="pt-2">
                              <button type="button" id="trigger-input-img" class="btn btn-primary btn-sm"
                                 title="Upload new profile image"><i class="bi bi-upload"></i></button>
                              <button id="set-req-del-true" type="button" class="btn btn-danger btn-sm"
                                 title="Remove my profile image"><i class="bi bi-trash"></i></button>
                           </div>
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                        <div class="col-md-8 col-lg-9">
                           <input required name="name" type="text" class="form-control" id="nama"
                              value="{{ $dataProfile->name }}">
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                           <input required name="email" type="email" class="form-control" id="email"
                              value="{{ $dataProfile->email }}">
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="password-input" class="col-md-4 col-lg-3 col-form-label">
                           Password <br> 
                           <span style="font-size: 0.8rem">kosongkan jika tidak ingin mengubah</span> 
                        </label>
                        <div class="col-md-8 col-lg-9">
                           <input type="password" name="password" id="password-input" class="form-control">
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                        <div class="col-md-8 col-lg-9">
                           <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                     </div>

                     @if (($dataProfile->role_id == 2) && $isActivateUser)
                        <!-- id_guru -->
                        <input type="text" hidden name="idg" value="{{ $dataGuru[0]->id_guru }}">
                        
                        <div class="row mb-3">
                           <label for="NIP" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                           <div class="col-md-8 col-lg-9">
                              <input name="NIP" type="text" class="form-control" id="NIP" value="{{ $dataGuru[0]->NIP }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="golongan" class="col-md-4 col-lg-3 col-form-label">Golongan</label>
                           <div class="col-md-8 col-lg-9">
                              <select class="form-control" id="golongan_id" name="golongan_id" required>
                              @foreach($dataGolongan as $gol)
                                 <option value="{{ $gol->id }}" {{ $gol->id == $dataGuru[0]->gol_id ? 'selected' : '' }}>
                                    {{ $gol->golongan }} - {{ $gol->pangkat }}
                                 </option>
                              @endforeach
                              </select>
                           </div>
                        </div>
                     @endif
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   window.onload = () => {
      const inputImage = document.getElementById('input-img')
      const reqDelInp = document.getElementById('request-del-profile')
      const fallbackText = document.getElementById('fallback-text')
      const imgPreview = document.getElementById('img-preview')
      const confirmPass = document.getElementById('password_confirmation')
      
      reqDelInp.value = 'false'

      // const dataT = new DataTransfer()
      // fetch('{{-- Storage::url($dataProfile->profile_photo) --}}')
      //    .then(data => data.blob())
      //    .then(img => {
      //       dataT.items.add(new File([img], '{{-- Storage::url($dataProfile->profile_photo) --}}'.replace('/storage/profile_photos/', ''), { type: img.type }))
      //       inputImage.files = dataT.files
      //    })

      confirmPass.disabled = true
      document.getElementById('password-input').addEventListener('input', ev => {
         if (ev.target.value.length > 0) {
            confirmPass.disabled = false
         } else {
            confirmPass.disabled = true
         }
      })

      document.querySelectorAll('#trigger-input-img').forEach(el => {
         el.addEventListener('click', () => {
            inputImage.click()
         })
      })

      inputImage.addEventListener('change', ev => {
         const files = ev.target.files

         if (files.length > 0) {
            reqDelInp.value = 'false'
            imgPreview.hidden = false
            fallbackText.hidden = true
            imgPreview.src = URL.createObjectURL(ev.target.files[0]);
         } else {
            // inputImage.files = dataT.files
            imgPreview.src = '{{ Storage::url($dataProfile->profile_photo) }}'
         }
      })

      document.getElementById('set-req-del-true').addEventListener('click', () => {
         reqDelInp.value = 'true'
         imgPreview.hidden = true
         fallbackText.hidden = false
      })

      fallbackText.hidden = '{{ isset($dataProfile->profile_photo) }}'
      imgPreview.hidden = '{{ !isset($dataProfile->profile_photo) }}'
   }
</script>
@endsection