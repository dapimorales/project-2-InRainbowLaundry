@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <!-- Alert Bawaan Sistem (Muncul kalau ada pesan status) -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                    <strong><i class="fa-solid fa-circle-check me-2"></i>Berhasil!</strong> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Card Welcome Alert yang Baru & Mewah -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-5 text-center" style="background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);">
                    <div class="mb-4">
                        <i class="fa-solid fa-face-smile-wink fa-4x text-success"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-3">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}! 👋</h2>
                    <p class="text-muted fs-5 mb-0">
                        Anda telah berhasil login ke dalam sistem. Selamat bertugas dan semoga harimu menyenangkan!
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection