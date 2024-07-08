{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
@extends('components.navbar')
<div class="container" style="margin-top: 8rem;">
    <h2>Tambah Data Guru</h2>
    <form action="{{ route('manage-guru.store') }}" method="POST">
        @csrf
        {{-- <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ old('id') }}" required>
        </div> --}}

        <div class="form-group">
            <label for="NIP">NIP</label>
            <input type="text" class="form-control" id="NIP" name="NIP" value="{{ old('NIP') }}" required>
        </div>

        <div class="form-group">
            <label for="golongan_id">Golongan</label>
            <select class="form-control" id="golongan_id" name="golongan_id" required>
                <option value="">Pilih Golongan</option>
                @foreach($golongan as $gol)
                    <option value="{{ $gol->id }}">{{ $gol->golongan }} - {{ $gol->pangkat }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ old('user_id') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
{{-- @endsection --}}
