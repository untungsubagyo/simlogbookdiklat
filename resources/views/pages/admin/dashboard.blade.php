@extends('layouts.root-layout')

@section('username')
    {{ $userdata->name }}
@endsection

@section('user-role')
    @if ($userdata->role_id == 1)
        Admin
    @else
        Guru
    @endif
@endsection

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <h1 class="text-3xl font-semibold">
        Selamat Datang
        <span class="fw-bold">
            {{ $userdata->name }}
        </span>
    </h1>
    
    <div class="col-lg-8 w-100">
        <div class="row">
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Banyak Guru <span>| Total</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $guruCounts }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Banyak Diklat <span>| Total</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-book"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $dataDiklat->count() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Rata-Rata Data Diklat <span>| per-guru</span></h5>
        
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $averageDiklatCount }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mt-3 mb-4">Daftar Diklat Guru</h3>

    <div class="flex flex-col gap-2">
        @forelse ($dataDiklat as $diklat)
            <a href="{{ route('viewDiklatGuru', $diklat->id) }}"
                class="group flex flex-col gap-4 mt-4 cursor-pointer shadow-sm transition-shadow duration-200 hover:shadow-lg">
                <div class="flex p-6 justify-between items-center w-full border border-black h-16 rounded-xl">
                    <div>
                        <h2 class="font-semibold text-xl">{{ $diklat->name }}</h2>
                        <p class="text-sm text-gray-500 italic">{{ $diklat->NIP }}</p>
                    </div>

                    <div class="flex gap-2 text-end text-gray-500 items-center">
                        <div>
                            <p class="text-sm">terakhir di ubah</p>
                            <p class="text-sm">{{ $diklat->updated_at }}</p>
                        </div>

                        <div
                            class="group-hover:translate-x-2 transition-transform duration-300 w-4 h-4 border-t border-l border-black rotate-[135deg]">
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <h5 class="text-center">
                Belum Ada Guru Yang Mencatat Diklat Nya
            </h5>
        @endforelse
    </div>
</section>
@endsection