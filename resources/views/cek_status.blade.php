<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Cucian - IN RAINBOW LAUNDRY</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfaf2; color: #333; }
        .text-cyan { color: #179BAE; }
        .text-navy { color: #170C79; }
        
        .custom-input:focus {
            border-color: transparent !important;
            box-shadow: none !important;
        }
        .btn-lacak {
            transition: all 0.3s ease-in-out;
        }
        .btn-lacak:hover {
            background-color: #127f90 !important; /* Warna teal-nya jadi agak gelap */
            transform: translateY(-3px); /* Efek tombolnya agak naik dikit */
            box-shadow: 0 6px 12px rgba(23, 155, 174, 0.4); /* Muncul bayangan */
        }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="container-fluid px-0 mb-5">
    <div class="position-relative d-flex align-items-center justify-content-center text-center text-white shadow-sm" 
         style="
            height: 350px; 
            background: linear-gradient(135deg, rgba(23, 155, 174, 0.85) 0%, rgba(111, 66, 193, 0.85) 100%), 
                        url('https://images.unsplash.com/photo-1545173168-9f1947eebb7f?q=80&w=2071&auto=format&fit=crop'); 
            background-size: cover; 
            background-position: center; 
            border-radius: 0 0 25px 25px;
         ">
        <div>
            <h1 class="fw-bold display-4 mb-0" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.4);">Cek Status Cucianmu</h1>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold" style="color: #179BAE; font-size: 2.5rem;">Tracking Status Cucianmu</h2>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-5"> 
            <form action="{{ route('cek-status.lacak') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <input type="text" name="invoice" class="form-control text-center shadow-sm py-2" placeholder="Masukan No E-Faktur Laundry..." required value="{{ old('invoice', $order->kode_invoice ?? '') }}" style="border-radius: 8px; border: 1.5px solid #179BAE; font-size: 14px;">
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn text-white fw-bold px-4 py-2 btn-lacak" style="background-color: #179BAE; border-radius: 8px; font-size: 14px;">
                        Lacak Status
                    </button>
                </div>

            </form>
        </div>
    </div>

    @if(isset($searched))
        <div class="row justify-content-center mt-5">
            <div class="col-md-9">
                
                @if($order)
                    @if($membership)
                    <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px; background: linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%);">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div>
                                <h4 class="mb-1 fw-bold text-dark">Halo, {{ $order->customer->nama ?? 'Pelanggan Setia' }}!</h4>
                                <p class="mb-0 text-dark">Status Membership Anda: <strong class="text-uppercase badge bg-warning text-dark px-3 py-1 fs-6" style="border-radius: 20px;">{{ $membership->paket }} Aktif</strong></p>
                                <small class="text-muted">Nikmati potongan harga otomatis setiap pesanan. Terima kasih!</small>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                        <div class="card-header bg-white p-4 border-bottom d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="text-muted mb-1">Nomor E-Faktur / Invoice:</h5>
                                <h4 class="fw-bold mb-0" style="color: #170C79;">{{ $order->kode_invoice }}</h4>
                            </div>
                            
                            <div class="text-end">
                                <h5 class="text-muted mb-1">Status Saat Ini:</h5>
                                @if($order->status_order == 'baru')
                                    <span class="badge bg-primary fs-5 px-4 py-2" style="border-radius: 20px;">Baru (Antrean)</span>
                                @elseif($order->status_order == 'proses')
                                    <span class="badge bg-warning text-dark fs-5 px-4 py-2" style="border-radius: 20px;">Sedang Diproses</span>
                                @elseif($order->status_order == 'selesai')
                                    <span class="badge bg-success fs-5 px-4 py-2" style="border-radius: 20px;">Selesai (Siap Diambil)</span>
                                @elseif($order->status_order == 'diambil')
                                    <span class="badge bg-info text-dark fs-5 px-4 py-2" style="border-radius: 20px;">Sudah Diambil</span>
                                @else
                                    <span class="badge bg-secondary fs-5 px-4 py-2" style="border-radius: 20px;">{{ strtoupper($order->status_order) }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="text-muted small text-uppercase fw-bold">Nama Pelanggan</label>
                                    <p class="fs-5 fw-bold mb-0">{{ $order->customer->nama ?? '-' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-muted small text-uppercase fw-bold">Tanggal Masuk (Pickup)</label>
                                    <p class="fs-5 mb-0 text-dark">{{ \Carbon\Carbon::parse($order->tgl_masuk)->format('d M Y, H:i') }} WIB</p>
                                </div>
                                
                                <div class="col-12"><hr class="text-muted opacity-25"></div>

                                <div class="col-md-6">
                                    <label class="text-muted small text-uppercase fw-bold">Rincian Layanan</label>
                                    <ul class="list-unstyled mb-0 mt-1">
                                        @foreach($order->orderDetails as $detail)
                                            <li class="fs-5 fw-bold text-dark d-flex justify-content-between">
                                                <span>• {{ $detail->service->nama_layanan ?? 'Layanan' }}</span>
                                                <span class="text-muted">(x{{ $detail->qty }})</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-muted small text-uppercase fw-bold">Total Biaya Cucian</label>
                                    <p class="fs-3 fw-bold text-danger mb-0">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light p-4 text-center border-0" style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                            <p class="mb-0 text-muted">Butuh bantuan atau ingin bertanya mengenai pesanan Anda? <br> <a href="https://wa.me/6281234567890" target="_blank" class="text-decoration-none fw-bold mt-2 d-inline-block" style="color: #179BAE;">Hubungi Kurir Kami <i class="fa-solid fa-up-right-from-square small ms-1"></i></a></p>
                        </div>
                    </div>
                @else
                    <div class="text-center py-5 shadow-sm bg-white" style="border-radius: 15px;">
                        <img src="https://illustrations.popsy.co/teal/falling-boy.svg" alt="Not Found Illustration" style="width: 250px;" class="mb-4 img-fluid">
                        <h3 class="fw-bold text-dark">Aduh, Pesanan Gak Ketemu !</h3>
                        <p class="text-muted mx-auto" style="max-width: 500px;">Sistem Dapi Laundry nggak nemuin pesanan dengan E-Faktur tersebut. Coba cek lagi Nomor Invoice yang ada di nota fisik atau chat WA lu, mungkin ada typo.</p>
                    </div>
                @endif
                
            </div>
        </div>
    @endif
</div>
@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>