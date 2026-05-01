<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan - IN RAINBOW LAUNDRY</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Link Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    body { font-family: 'Poppins', sans-serif; background-color: #fcfaf2; color: #333; }
    
    /* Warna Dasar Button (Keadaan Normal) */
    .btn-cyan-active { 
        background-color: #179BAE; 
        color: white; 
        border-radius: 50px; 
        border: none; 
        transition: 0.3s; 
    }
    
    .btn-light-custom { 
        background-color: #f0f0f0; 
        border-radius: 50px; 
        border: none; 
        color: #6c757d;
    }

    /* KUNCI UTAMA: Styling saat tombol AKTIF (diklik) */
    .nav-pills .nav-link.active {
        background-color: #179BAE !important;
        color: white !important;
        box-shadow: 0 4px 10px rgba(23, 155, 174, 0.3);
    }

    /* Styling saat tombol TIDAK aktif */
    .nav-pills .nav-link:not(.active) {
        background-color: #f0f0f0 !important;
        color: #6c757d !important;
    }

    .text-cyan { color: #179BAE; }
    .text-navy { color: #170C79; }
    .card { transition: transform 0.3s ease; border-radius: 20px; }
    .card:hover { transform: scale(1.02); }
    /* Animasi Fade In Up */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-page {
        animation: fadeInUp 0.8s ease-out forwards;
    }
</style>
</head>
<body>

@include('partials.navbar')

<div class="container my-5 my-5 fade-in-page">
    <!-- Banner -->
    <div class="position-relative overflow-hidden shadow-sm mb-4" 
         style="height: 250px; border-radius: 30px; background: url('https://images.unsplash.com/photo-1545173168-9f1947eebb7f?q=80&w=2071&auto=format&fit=crop') center/cover no-repeat;">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" 
             style="background-color: rgba(86, 182, 198, 0.85);">
            <h1 class="text-white fw-bold display-5 text-uppercase">Syarat & Ketentuan</h1>
        </div>
    </div>

    <!-- Navigasi Tab (Fix: Pake Sistem Pill Bootstrap) -->
<ul class="nav nav-pills gap-3 justify-content-center mb-5" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active btn-cyan-active px-4 py-2 fw-bold shadow-sm" 
                id="pills-pesanan-tab" 
                data-bs-toggle="pill" 
                data-bs-target="#pills-pesanan" 
                type="button" 
                role="tab" 
                aria-controls="pills-pesanan" 
                aria-selected="true">
            Syarat & Ketentuan : Pesanan
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link btn-light-custom px-4 py-2 fw-bold text-muted border-0" 
                id="pills-kiloan-tab" 
                data-bs-toggle="pill" 
                data-bs-target="#pills-kiloan" 
                type="button" 
                role="tab" 
                aria-controls="pills-kiloan" 
                aria-selected="false">
            Syarat & Ketentuan : Laundry Kiloan
        </button>
    </li>
</ul>

    <!-- Konten Teks (Bungkus pake tab-content biar bisa ganti-ganti) -->
    <div class="tab-content row justify-content-center mb-5" id="pills-tabContent">
        
        <!-- KONTEN 1: SYARAT PESANAN -->
        <div class="tab-pane fade show active col-lg-10" id="pills-pesanan" role="tabpanel" aria-labelledby="pills-pesanan-tab">
            <div class="mb-5 px-3">
                <div class="d-flex align-items-start mb-3">
                    <div class="text-cyan fw-bold me-2">1.</div>
                    <p class="text-cyan fw-medium mb-0">Pelayanan dan transaksi dilakukan berdasarkan sistem antrian dan cucian akan diproses apabila sudah dilakukan pembayaran lunas.</p>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <div class="text-cyan fw-bold me-2">2.</div>
                    <p class="text-cyan fw-medium mb-0">Pemesanan layanan membership akan tercatat otomatis di sistem pesanan (Orders) dan rincian paket akan masuk ke detail pesanan.</p>
                </div>
            </div>
        </div>

        <!-- KONTEN 2: LAUNDRY KILOAN -->
        <div class="tab-pane fade col-lg-10" id="pills-kiloan" role="tabpanel" aria-labelledby="pills-kiloan-tab">
            <div class="mb-5 px-3">
                <h5 class="fw-bold text-cyan mb-3">PERHATIAN!</h5>
                <h6 class="fw-bold text-cyan mb-4">PAKAIAN SATUAN TIDAK BISA MASUK LAUNDRY KILOAN</h6>
                
                <ul class="list-unstyled">
                    <li class="text-cyan mb-2">• Sweater</li>
                    <li class="text-cyan mb-2">• Jaket</li>
                    <li class="text-cyan mb-2">• Pakaian batik</li>
                    <li class="text-cyan mb-2">• Gamis</li>
                    <li class="text-cyan mb-2">• Pakaian Berbahan Sutra</li>
                    <li class="text-cyan mb-2">• Pakaian Berbahan Sifon</li>
                    <li class="text-cyan mb-2">• Handuk/Piyama Mandi</li>
                    <li class="text-cyan mb-2">• Sajadah & Mukena</li>
                    <li class="text-cyan mb-2">• Kebaya</li>
                    <li class="text-cyan mb-2">• Pakaian warna Putih & Merah</li>
                    <li class="text-cyan mb-2">• Jaket, Blazer dan dasi blouse</li>
                    <li class="text-cyan mb-2">• Bedcover/Linen</li>
                    <li class="text-cyan mb-2">• Curtain/Gordyn</li>
                </ul>

                <p class="mt-5 text-cyan fw-medium italic" style="font-style: italic;">
                    *Apabila customer tetap mau mencuci kiloan maka customer yang bertanggung jawab jika terjadi kerusakan dll.
                </p>
            </div>
        </div>

    </div>

    

    <hr class="my-5" style="border-top: 2px dashed #179BAE; opacity: 0.3;">

    <!-- Judul Paket -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-navy">Paket Membership IN RAINBOW LAUNDRY</h2>
        <p class="text-muted">Daftar membership bisa lebih hemat sampai Rp 100.000</p>
    </div>

    <!-- Tiga Kartu Paket -->
    <div class="row g-4 mb-5">
        <!-- Silver -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header py-3 border-0 text-center text-white fw-bold" style="background-color: #B8B8B8;">Paket Silver</div>
                <div class="card-body text-center p-4">
                    <h2 class="fw-bold">Rp 300<span class="fs-4">.000</span></h2>
                    <p class="text-muted">/ Bulan</p>
                    <p class="text-cyan fw-bold"><i class="bi bi-check-circle me-1"></i> Tambahan Saldo 20.000</p>
                    <button class="btn btn-cyan-active px-5 mt-3">Pilih Paket</button>
                    <p class="mt-3 small text-muted italic">*Harga bisa berubah sewaktu-waktu</p>
                </div>
            </div>
        </div>

        <!-- Gold -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 position-relative overflow-hidden" style="border: 2px solid #D4AF37;">
                <!-- Label Paling Laris (Fix Presisi) -->
                <div class="position-absolute bg-danger text-white fw-bold shadow-sm" 
                    style="top: 20px; 
                            right: -35px; 
                            transform: rotate(45deg); 
                            width: 160px; 
                            font-size: 10px; 
                            text-align: center; 
                            z-index: 10; 
                            padding: 4px 0;
                            letter-spacing: 1px;">
                    PALING LARIS
                </div>
                <div class="card-header py-3 border-0 text-center text-white fw-bold" style="background-color: #D4AF37;">Paket Gold</div>
                <div class="card-body text-center p-4">
                    <h2 class="fw-bold">Rp 500<span class="fs-4">.000</span></h2>
                    <p class="text-muted">/ Bulan</p>
                    <p class="text-cyan fw-bold"><i class="bi bi-check-circle me-1"></i> Tambahan Saldo 50.000</p>
                    <button class="btn btn-cyan-active px-5 mt-3">Pilih Paket</button>
                    <p class="mt-3 small text-muted italic">*Harga bisa berubah sewaktu-waktu</p>
                </div>
            </div>
        </div>

        <!-- Platinum -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header py-3 border-0 text-center text-white fw-bold" style="background-color: #4C6767;">Paket Platinum</div>
                <div class="card-body text-center p-4">
                    <h2 class="fw-bold">Rp 900<span class="fs-4">.000</span></h2>
                    <p class="text-muted">/ Bulan</p>
                    <p class="text-cyan fw-bold"><i class="bi bi-check-circle me-1"></i> Tambahan Saldo 100.000</p>
                    <button class="btn btn-cyan-active px-5 mt-3">Pilih Paket</button>
                    <p class="mt-3 small text-muted italic">*Harga bisa berubah sewaktu-waktu</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>