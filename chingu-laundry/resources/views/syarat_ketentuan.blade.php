<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan - IN RAINBOW LAUNDRY</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    body { font-family: 'Poppins', sans-serif; background-color: #fcfaf2; color: #333; }
    
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

    .nav-pills .nav-link.active {
        background-color: #179BAE !important;
        color: white !important;
        box-shadow: 0 4px 10px rgba(23, 155, 174, 0.3);
    }

    .nav-pills .nav-link:not(.active) {
        background-color: #f0f0f0 !important;
        color: #6c757d !important;
    }

    .text-cyan { color: #179BAE; }
    .text-navy { color: #170C79; }
    .card { transition: transform 0.3s ease; border-radius: 20px; }
    .card:hover { transform: scale(1.02); }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .fade-in-page { animation: fadeInUp 0.8s ease-out forwards; }

    /* ===== MODAL STYLES ===== */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.25s ease, visibility 0.25s ease;
    }

    .modal-overlay.aktif {
        opacity: 1;
        visibility: visible;
    }

    .modal-container {
        background: #fff;
        border-radius: 16px;
        padding: 40px 36px;
        width: 100%;
        max-width: 520px;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        transform: translateY(20px);
        transition: transform 0.25s ease;
    }

    .modal-overlay.aktif .modal-container {
        transform: translateY(0);
    }

    .modal-close {
        position: absolute;
        top: 14px;
        right: 18px;
        background: none;
        border: none;
        font-size: 26px;
        cursor: pointer;
        color: #888;
        line-height: 1;
    }

    .modal-close:hover { color: #333; }

    .modal-title {
        font-size: 26px;
        font-weight: 700;
        color: #179BAE;
        margin-bottom: 24px;
    }

    .modal-form .form-control,
    .modal-form .form-select {
        border: 1.5px solid #ddd;
        border-radius: 8px;
        padding: 11px 14px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        transition: border-color 0.2s;
    }

    .modal-form .form-control:focus,
    .modal-form .form-select:focus {
        border-color: #179BAE;
        box-shadow: none;
    }

    .modal-form .form-select {
        color: #179BAE;
        font-weight: 600;
    }

    .modal-form .form-control::placeholder { color: #bbb; }

    .checkbox-label {
        font-size: 13px;
        color: #444;
        line-height: 1.7;
        cursor: pointer;
    }

    .checkbox-label input[type="checkbox"] {
        accent-color: #179BAE;
        margin-top: 3px;
    }

    .btn-daftar {
        width: 100%;
        padding: 13px;
        background: #179BAE;
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        cursor: pointer;
        margin-top: 8px;
        transition: background 0.2s, transform 0.1s;
    }

    .btn-daftar:hover {
        background: #127f90;
        transform: translateY(-1px);
    }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="container my-5 fade-in-page">
    <!-- Banner -->
    <div class="position-relative overflow-hidden shadow-sm mb-4" 
         style="height: 250px; border-radius: 30px; background: url('https://images.unsplash.com/photo-1545173168-9f1947eebb7f?q=80&w=2071&auto=format&fit=crop') center/cover no-repeat;">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" 
             style="background-color: rgba(86, 182, 198, 0.85);">
            <h1 class="text-white fw-bold display-5 text-uppercase">Syarat & Ketentuan</h1>
        </div>
    </div>

    <!-- Navigasi Tab -->
    <ul class="nav nav-pills gap-3 justify-content-center mb-5" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active btn-cyan-active px-4 py-2 fw-bold shadow-sm" 
                    id="pills-pesanan-tab" data-bs-toggle="pill" data-bs-target="#pills-pesanan" 
                    type="button" role="tab" aria-controls="pills-pesanan" aria-selected="true">
                Syarat & Ketentuan : Pesanan
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link btn-light-custom px-4 py-2 fw-bold text-muted border-0" 
                    id="pills-kiloan-tab" data-bs-toggle="pill" data-bs-target="#pills-kiloan" 
                    type="button" role="tab" aria-controls="pills-kiloan" aria-selected="false">
                Syarat & Ketentuan : Laundry Kiloan
            </button>
        </li>
    </ul>

    <!-- Konten Tab -->
    <div class="tab-content row justify-content-center mb-5" id="pills-tabContent">
        
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
                <p class="mt-5 text-cyan fw-medium" style="font-style: italic;">
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
                    {{-- Tambahkan onclick="bukaMembership(...)" --}}
                    <button class="btn btn-cyan-active px-5 mt-3" onclick="bukaMembership('silver', 'Paket Silver : Extra Saldo Rp 20.000')">Pilih Paket</button>
                    <p class="mt-3 small text-muted italic">*Harga bisa berubah sewaktu-waktu</p>
                </div>
            </div>
        </div>

        <!-- Gold -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 position-relative overflow-hidden" style="border: 2px solid #D4AF37;">
                <div class="position-absolute bg-danger text-white fw-bold shadow-sm" 
                    style="top: 20px; right: -35px; transform: rotate(45deg); width: 160px; font-size: 10px; text-align: center; z-index: 10; padding: 4px 0; letter-spacing: 1px;">
                    PALING LARIS
                </div>
                <div class="card-header py-3 border-0 text-center text-white fw-bold" style="background-color: #D4AF37;">Paket Gold</div>
                <div class="card-body text-center p-4">
                    <h2 class="fw-bold">Rp 500<span class="fs-4">.000</span></h2>
                    <p class="text-muted">/ Bulan</p>
                    <p class="text-cyan fw-bold"><i class="bi bi-check-circle me-1"></i> Tambahan Saldo 50.000</p>
                    <button class="btn btn-cyan-active px-5 mt-3" onclick="bukaMembership('gold', 'Paket Gold : Extra Saldo Rp 50.000')">Pilih Paket</button>
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
                    <button class="btn btn-cyan-active px-5 mt-3" onclick="bukaMembership('platinum', 'Paket Platinum : Extra Saldo Rp 100.000')">Pilih Paket</button>
                    <p class="mt-3 small text-muted italic">*Harga bisa berubah sewaktu-waktu</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== MODAL MEMBERSHIP ===== -->
<div id="modalMembership" class="modal-overlay" onclick="tutupModalDiluar(event)">
    <div class="modal-container">
        <button class="modal-close" onclick="tutupModal()">&times;</button>
        <h2 class="modal-title">Form Membership</h2>

        <form class="modal-form" action="{{ route('membership.store') }}" method="POST">
            @csrf
            <input type="hidden" name="paket" id="inputPaket" value="">

            <div class="mb-3">
                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap" required>
            </div>
            <div class="row mb-3 g-2">
                <div class="col-6">
                    <input type="text" class="form-control" name="kota" placeholder="Kota" required>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos" required>
                </div>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="nomor_whatsapp" placeholder="Nomor Whatsapp" required>
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" name="tanggal_lahir" required>
            </div>
            <div class="mb-3">
                <select class="form-select" name="paket_dipilih" id="selectPaket">
                    <option value="silver">Paket Silver : Extra Saldo Rp 20.000</option>
                    <option value="gold">Paket Gold : Extra Saldo Rp 50.000</option>
                    <option value="platinum">Paket Platinum : Extra Saldo Rp 100.000</option>
                </select>
            </div>
            <div class="mb-3 d-flex align-items-start gap-2">
                <input type="checkbox" name="setuju" id="checkSetuju" required style="margin-top: 4px; accent-color: #179BAE;">
                <label for="checkSetuju" class="checkbox-label">
                    - Saya telah membaca dan memahami syarat dan ketentuan keanggotaan laundry ini.<br>
                    - Saya Setuju untuk mengikuti semua ketentuan yang berlaku
                </label>
            </div>

            <button type="submit" class="btn-daftar">Daftar Sekarang</button>
        </form>
    </div>
</div>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function bukaMembership(paketValue, paketLabel) {
        // Set hidden input & select sesuai paket yang dipilih
        document.getElementById('inputPaket').value = paketValue;
        const select = document.getElementById('selectPaket');
        for (let opt of select.options) {
            if (opt.value === paketValue) { opt.selected = true; break; }
        }
        // Tampilkan modal
        document.getElementById('modalMembership').classList.add('aktif');
        document.body.style.overflow = 'hidden';
    }

    function tutupModal() {
        document.getElementById('modalMembership').classList.remove('aktif');
        document.body.style.overflow = '';
    }

    // Tutup kalau klik di luar modal-container
    function tutupModalDiluar(e) {
        if (e.target === document.getElementById('modalMembership')) {
            tutupModal();
        }
    }

    // Tutup dengan tombol ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') tutupModal();
    });
</script>
</body>
</html>