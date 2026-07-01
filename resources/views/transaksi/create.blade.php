@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-navy fw-bold">Kasir Offline (Di Toko)</h1>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary btn-sm">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-header text-white fw-bold" style="background-color: #179BAE;">
        <i class="fa-solid fa-cash-register me-2"></i> Form Transaksi Baru
    </div>
    <div class="card-body p-4">
        <form action="{{ route('transaksi.store_manual') }}" method="POST">
            @csrf
            <div class="row g-4">
                
                <div class="col-12">
                    <h5 class="fw-bold text-navy mb-0 border-bottom pb-2">1. Informasi Pelanggan</h5>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">No WhatsApp</label>
                    <input type="number" name="no_hp" class="form-control border-primary" placeholder="Contoh: 08123456789" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control border-primary" placeholder="Nama Lengkap" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat" class="form-control border-primary" placeholder="Isi strip (-) jika tidak ada" required>
                </div>

                <div class="col-12 mt-4">
                    <h5 class="fw-bold text-navy mb-0 border-bottom pb-2">2. Rincian Cucian & Pembayaran</h5>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label fw-bold">Estimasi Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control border-danger" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Pilih Layanan</label>
                    <select name="service_id" class="form-select border-success" required>
                        <option value="" selected disabled>-- Pilih Layanan --</option>
                        @foreach($services as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_layanan }} (Rp {{ number_format($s->harga) }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Berat / Qty Asli (Kg/Pcs)</label>
                    <input type="number" name="qty" class="form-control border-success" placeholder="Masukkan angka timbangan" required min="1">
                </div>
                
                <div class="col-md-6">
                    <label class="form-label fw-bold">Status Pembayaran</label>
                    <select name="status_bayar" class="form-select border-warning" required>
                        <option value="belum">Belum Lunas</option>
                        <option value="lunas">Lunas</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Metode Pembayaran (Isi jika Lunas)</label>
                    <select name="metode_pembayaran" class="form-select border-warning">
                        <option value="">- Kosong -</option>
                        <option value="Cash">Uang Tunai (Cash)</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="QRIS / e-Wallet">QRIS / e-Wallet</option>
                    </select>
                </div>

                <div class="col-12 mt-4 text-end">
                    <button type="reset" class="btn btn-light me-2">Reset</button>
                    <button type="submit" class="btn text-white fw-bold px-5" style="background-color: #170C79; border-radius: 8px;">
                        <i class="fa-solid fa-save me-1"></i> Simpan Transaksi
                    </button>
                </div>
                
            </div>
        </form>
    </div>
</div>
@endsection