@extends('layouts.app') 

@section('content')
<!-- Tambahan Style Biar Kotaknya Bisa Ngangkat Pas Disorot Mouse -->
<style>
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
    
</style>

<div class="container-fluid px-4">
    <!-- Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-4 border-bottom">
        <h1 class="h3 fw-bold text-dark">Dashboard Overview</h1>
    </div>

    <!-- Kotak-kotak Data -->
    <div class="row g-4 mb-5">
        
        <!-- Card 1: Total Pendapatan -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-hover border-0 shadow-sm h-100 p-2" style="background: linear-gradient(135deg, #198754 0%, #20c997 100%); color: white; border-radius: 15px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-xs fw-bold text-uppercase" style="letter-spacing: 1px; opacity: 0.8;">Total Pendapatan</div>
                        <div class="icon-circle bg-white bg-opacity-25">
                            <i class="fa-solid fa-wallet fs-5"></i>
                        </div>
                    </div>
                    <div class="h4 mb-0 fw-bold">Rp {{ number_format($pendapatanLaundry, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Pesanan -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-hover border-0 shadow-sm h-100 p-2" style="background: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%); color: white; border-radius: 15px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-xs fw-bold text-uppercase" style="letter-spacing: 1px; opacity: 0.8;">Total Pesanan</div>
                        <div class="icon-circle bg-white bg-opacity-25">
                            <i class="fa-solid fa-basket-shopping fs-5"></i>
                        </div>
                    </div>
                    <div class="h4 mb-0 fw-bold">{{ $totalPesanan }} <span class="fs-6 fw-normal opacity-75">Cucian</span></div>
                </div>
            </div>
        </div>

        <!-- Card 3: Pelanggan Reguler -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-hover border-0 shadow-sm h-100 p-2" style="background: linear-gradient(135deg, #ffc107 0%, #ffca2c 100%); color: #212529; border-radius: 15px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-xs fw-bold text-uppercase" style="letter-spacing: 1px; opacity: 0.8;">Pelanggan Reguler</div>
                        <div class="icon-circle bg-dark bg-opacity-10">
                            <i class="fa-solid fa-users fs-5"></i>
                        </div>
                    </div>
                    <div class="h4 mb-0 fw-bold">{{ $totalPelanggan }} <span class="fs-6 fw-normal opacity-75">Orang</span></div>
                </div>
            </div>
        </div>

        <!-- Card 4: Member Aktif -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-hover border-0 shadow-sm h-100 p-2" style="background: linear-gradient(135deg, #dc3545 0%, #e55353 100%); color: white; border-radius: 15px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-xs fw-bold text-uppercase" style="letter-spacing: 1px; opacity: 0.8;">Member Aktif</div>
                        <div class="icon-circle bg-white bg-opacity-25">
                            <i class="fa-solid fa-id-card fs-5"></i>
                        </div>
                    </div>
                    <div class="h4 mb-0 fw-bold">{{ $memberAktif }} <span class="fs-6 fw-normal opacity-75">Member</span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- TABEL TRANSAKSI TERBARU -->
    <div class="row mt-2 mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <!-- Judul Tabel -->
                <div class="card-header bg-white border-bottom-0 pt-4 pb-2" style="border-radius: 15px 15px 0 0;">
                    <h5 class="fw-bold text-dark mb-0">
                        <i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i>5 Transaksi Terbaru
                    </h5>
                </div>
                
                <!-- Isi Tabel -->
                <div class="card-body p-4 pt-2">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-secondary text-uppercase" style="font-size: 0.8rem;">Invoice</th>
                                    <th class="text-secondary text-uppercase" style="font-size: 0.8rem;">Pelanggan</th>
                                    <th class="text-secondary text-uppercase" style="font-size: 0.8rem;">Tgl Masuk</th>
                                    <th class="text-secondary text-uppercase" style="font-size: 0.8rem;">Status Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transaksiTerbaru as $trx)
                                <tr>
                                    <td><span class="badge bg-secondary">{{ $trx->kode_invoice }}</span></td>
                                    
                                    <td class="fw-bold text-dark">{{ $trx->customer->nama ?? 'Data Terhapus' }}</td>
                                    
                                    <td>{{ \Carbon\Carbon::parse($trx->tgl_masuk)->format('d M Y, H:i') }}</td>
                                    
                                    <td>
                                        @if($trx->status_order == 'baru')
                                            <span class="badge bg-primary px-3 py-2">Baru</span>
                                        @elseif($trx->status_order == 'proses')
                                            <span class="badge bg-warning text-dark px-3 py-2">Diproses</span>
                                        @elseif($trx->status_order == 'selesai')
                                            <span class="badge bg-success px-3 py-2">Selesai</span>
                                        @elseif($trx->status_order == 'diambil')
                                            <span class="badge bg-info text-dark px-3 py-2">Diambil</span>
                                        @else
                                            <span class="badge bg-secondary px-3 py-2">{{ $trx->status_order }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Belum ada transaksi yang masuk nih, Masbro.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection