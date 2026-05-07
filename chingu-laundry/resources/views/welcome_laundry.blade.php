<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Rainbow Laundry - No. 1 Laundry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    /* Keyframes buat efek masuk dari luar (zoom + fade) */
    @keyframes entryEffect {
        from {
            opacity: 0;
            transform: scale(0.7) translateY(20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    /* Class utama animasi */
    .animate-item {
        opacity: 0; /* Awalnya sembunyi */
        animation: entryEffect 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }

    /* Delay biar masuknya satu per satu */
    .delay-1 { animation-delay: 0.2s; }
    .delay-2 { animation-delay: 0.5s; }
    .delay-3 { animation-delay: 0.8s; }
    .delay-4 { animation-delay: 1.1s; }
    .custom-input {
        border: 1px solid #e0e0e0;
        border-radius: 4px;
        color: #6c757d;
    }
    .custom-input:focus {
        border-color: #179BAE;
        box-shadow: 0 0 0 0.2rem rgba(23, 155, 174, 0.25);
    }
    .custom-input::placeholder {
        color: #adb5bd;
    }
    .custom-modal-input {
        border: 1px solid #dce2e6;
        border-radius: 4px;
        color: #495057;
    }
    .custom-modal-input:focus {
        border-color: #179BAE;
        box-shadow: 0 0 0 0.2rem rgba(23, 155, 174, 0.25);
    }
    .custom-modal-input::placeholder {
        color: #adb5bd;
    }
</style>
@include('partials.navbar')

<section class="hero overflow-hidden animate-zoom-in animate-item delay-1" style="background: linear-gradient(135deg, #EFE3CA 0%, #ffffff 100%); padding: 0;">
    <div class="container-fluid p-0">
        <div class="row g-0 align-items-center">
            
            <div class="col-md-5 py-5" style="padding-left: 8%; padding-right: 5%;">
                <h1 class="display-4 fw-bold text-navy mb-3" style="line-height: 1.2;">
                    No. 1 Laundry Express<br>di Bugel
                </h1>
                <p class="lead mb-4 text-muted">
                    In Rainbow Laundry: Bersih, Wangi, Higienis, dan Tepat Waktu untuk kebutuhan harianmu.
                </p>
                <div class="d-flex gap-3 animate-item delay-2">
                    <div class="bg-white p-3 rounded shadow-sm border text-center">
                        <small class="text-muted d-block">Mulai Dari</small>
                        <strong class="text-navy fs-5">IDR 5.000</strong>
                    </div>
                    <div class="bg-white p-3 rounded shadow-sm border text-center animate-item delay-2">
                        <small class="text-muted d-block">Layanan</small>
                        <strong class="text-navy fs-5">Express 3 Jam</strong>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div style="width: 100%; height: 500px; overflow: hidden; border-radius: 50px 0 0 50px; box-shadow: -15px 0 45px rgba(23,12,121,0.1);">
                    <video autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover;">
                        <source src="{{ asset('images/hero-laundry.mp4') }}" type="video/mp4">
                        Browser kamu nggak support video.
                    </video>
                </div>
            </div>

        </div>
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-center">
                </div>
            
            <div style="height: 150px;"></div> 
        </div>
    </div>
</section>

<section class="reservasi-section position-relative" style="margin-top: -100px; z-index: 20; padding-top: 50px; padding-bottom: 100px; background-color: #fcfaf2;">
    
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('https://img.icons8.com/ios/100/170C79/washing-machine.png'); background-repeat: repeat; background-size: 100px; opacity: 0.03; z-index: 0;"></div>

    <div class="container position-relative" style="z-index: 1;">
        <div class="card border-0 shadow-lg p-4 p-md-5" style="border-radius: 35px; background: #ffffff; box-shadow: 0 30px 70px rgba(23, 12, 121, 0.12) !important;">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 class="fw-bold text-navy mb-1">Reservasi Laundry</h3>
                    <p class="text-muted small">Isi data di bawah, kurir kami akan segera menjemput pakaianmu.</p>
                </div>

                <form action="{{ route('reservasi.store') }}" method="POST" class="row g-3">
                    @csrf 
                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control form-custom" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="alamat" class="form-control form-custom" placeholder="Alamat Jemput" required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="no_hp" class="form-control form-custom" placeholder="WhatsApp" required>
                    </div>
                    
                    <div class="col-md-4">
                        <select name="service_id" class="form-select form-custom" required>
                            <option value="" selected disabled>Pilih Layanan</option>
                            <option value="1">Daily Kiloan</option>
                            <option value="2">Cuci & Setrika</option>
                            <option value="3">Laundry Sepatu</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <input type="date" name="tgl_jemput" class="form-control form-custom" required>
                    </div>
                    <div class="col-md-4">
                        <input type="time" name="jam_jemput" class="form-control form-custom" required>
                    </div>

                    <div class="col-12 mt-4 text-end">
                        <button type="submit" class="btn btn-navy px-5 py-3 shadow-sm" style="border-radius: 15px; background-color: #170C79; color: white; border: none; font-weight: bold;">
                            Pickup Now 🚚
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="layanan-kami" class="py-5" style="background-color: #ffffff;">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="fw-bold text-uppercase" style="letter-spacing: 2px; color: #56B6C6;">Layanan Unggulan</h6>
            <h2 class="display-6 fw-bold" style="color: #170C79;">In Rainbow Laundry</h2>
        </div>

        <style>
            @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
            @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
            @keyframes shake { 0%, 100% { transform: rotate(0); } 25% { transform: rotate(5deg); } 75% { transform: rotate(-5deg); } }
            .anim-spin { animation: spin 3s linear infinite; transform-origin: center; }
            .anim-float { animation: float 3s ease-in-out infinite; }
            .anim-shake { animation: shake 0.5s ease-in-out infinite; }
            .service-card { transition: 0.3s; border-radius: 20px !important; background-color: #fcfaf2; }
            .service-card:hover { transform: translateY(-10px); background-color: #ffffff; box-shadow: 0 15px 30px rgba(23, 12, 121, 0.1) !important; }
        </style>

        <div class="row g-4 justify-content-center">
            
            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 service-card">
                    <div class="mb-3 d-flex justify-content-center">
                        <svg width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="2">
                            <rect x="4" y="3" width="16" height="18" rx="2"/>
                            <circle class="anim-spin" cx="12" cy="13" r="5" stroke="#56B6C6" stroke-dasharray="4 2"/>
                            <path d="M7 6h2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h6 class="fw-bold text-navy">Daily Kiloan</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 service-card">
                    <div class="mb-3 d-flex justify-content-center">
                        <svg class="anim-shake" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="2">
                            <path d="M7 18h10a4 4 0 0 0 4-4V8H3v6a4 4 0 0 0 4 4z"/>
                            <path d="M12 8V4h5" stroke="#56B6C6" stroke-linecap="round"/>
                            <path d="M7 14h10" stroke="#56B6C6" stroke-dasharray="2 2"/>
                        </svg>
                    </div>
                    <h6 class="fw-bold text-navy">Cuci & Setrika</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 service-card">
                    <div class="mb-3 d-flex justify-content-center">
                        <svg class="anim-float" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="2">
                            <path d="M3.5 17.5L5 11.5l1.5-2.5h5l2.5 3 6.5 2.5v3h-17z" />
                            <path d="M8 9.5l1-2.5h3l1 2.5M14 14.5l1.5-2m-3.5 2l1.5-2" stroke="#56B6C6" />
                            <path d="M3.5 15.5h17" stroke="#56B6C6" stroke-width="1"/>
                        </svg>
                    </div>
                    <h6 class="fw-bold text-navy">Laundry Sepatu</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 service-card">
                    <div class="mb-3 d-flex justify-content-center">
                        <svg class="anim-shake" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="2">
                            <rect x="5" y="8" width="14" height="12" rx="2"/>
                            <path d="M9 8V5a3 3 0 0 1 6 0v3" stroke="#56B6C6"/>
                        </svg>
                    </div>
                    <h6 class="fw-bold text-navy">Laundry Tas</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 service-card">
                    <div class="mb-3 d-flex justify-content-center">
                        <svg class="anim-float" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="2">
                            <rect x="3" y="8" width="18" height="10" rx="1" />
                            <path d="M6 8v10M10 8v10M14 8v10M18 8v10" stroke="#56B6C6" stroke-dasharray="2 1" />
                            <path d="M3 6l1 2m2-2l1 2m12-2l1 2m2-2l1 2" stroke="#170C79" /> </svg>
                    </div>
                    <h6 class="fw-bold text-navy">Laundry Karpet</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 service-card">
                    <div class="mb-3 d-flex justify-content-center">
                        <svg class="anim-float" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="2">
                            <path d="M4 8h16c1 0 2 1 2 2v8c0 1-1 2-2 2H4c-1 0-2-1-2-2V10c0-1 1-2 2-2z" />
                            <path d="M2 12h20M7 8v12M17 8v12" stroke="#56B6C6" stroke-width="1.5" />
                            <circle cx="12" cy="15" r="2" fill="#56B6C6" opacity="0.4" />
                        </svg>
                    </div>
                    <h6 class="fw-bold text-navy">Laundry Bed Cover</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 service-card">
                    <div class="mb-3 d-flex justify-content-center">
                        <svg class="anim-float" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="2">
                            <path d="M5 6h14v12H5z"/>
                            <path d="M5 10h14M5 14h14" stroke="#56B6C6"/>
                            <path d="M3 6l2 2m14-2l2 2" stroke="#170C79"/>
                        </svg>
                    </div>
                    <h6 class="fw-bold text-navy">Laundry Sprei</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 service-card">
                    <div class="mb-3 d-flex justify-content-center">
                        <svg class="anim-shake" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="2">
                            <path d="M3 8a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8z"/>
                            <path d="M12 6v12M3 12h18" stroke="#56B6C6" opacity="0.3"/>
                            <path d="M6 9l2 2m10-2l-2 2" stroke="#56B6C6"/>
                        </svg>
                    </div>
                    <h6 class="fw-bold text-navy">Sarung Bantal</h6>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .service-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #fcfaf2; /* Beige tipis agar seragam */
    }
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(23, 12, 121, 0.1) !important;
        background-color: #ffffff;
    }
</style>

<section id="tentang-kami" class="py-5" style="background-color: #fcfaf2;">
    <div class="container py-md-5">
        <div class="row align-items-center">
            
            <div class="col-md-6 mb-5 mb-md-0">
    <div class="position-relative">
        <img src="{{ asset('images/about-us.jpeg') }}" 
             alt="About In Rainbow Laundry" 
             class="img-fluid shadow-lg" 
             style="border-radius: 40px; border-bottom-right-radius: 0; width: 100%; height: 500px; object-fit: cover;">
        
        <div class="position-absolute bottom-0 start-0 translate-middle-x ms-5 mb-n4 d-none d-md-block" style="z-index: 5;">
            <div class="bg-white p-4 shadow-lg text-center" style="border-radius: 50%; width: 160px; height: 160px; display: flex; flex-direction: column; justify-content: center; border: 8px solid #56B6C6;">
                <h2 class="fw-bold text-navy mb-0">100%</h2>
                <small class="text-muted fw-bold">Pengalaman<br>Terbaik</small>
            </div>
        </div>
    </div>
</div>

            <div class="col-md-6 ps-md-5">
                <h6 class="fw-bold text-sea text-uppercase mb-3" style="letter-spacing: 2px;">Tentang Kami</h6>
                <h2 class="display-6 fw-bold text-navy mb-4" style="line-height: 1.3;">
                    Laundry Bersih, Wangi,<br>Higienis, dan Tepat Waktu
                </h2>
                
                <p class="text-muted mb-4" style="text-align: justify;">
                    <strong class="text-navy">In Rainbow Laundry</strong> adalah layanan laundry kiloan dan satuan profesional. Kami mengutamakan kualitas cucian dengan prinsip bersih, rapi, dan higienis untuk menjaga kepercayaan Anda.
                </p>

                <div class="p-4 rounded-4 d-flex align-items-start shadow-sm" style="background-color: rgba(86, 182, 198, 0.1); border-left: 5px solid #56B6C6;">
                    <div class="me-3">
                        <span style="font-size: 1.5rem;">💡</span>
                    </div>
                    <div>
                        <h6 class="fw-bold text-navy mb-1">Stop Mencuci Sendiri</h6>
                        <small class="text-muted">Maksimalkan waktu berharga Anda, biarkan tim profesional kami yang mencuci untuk Anda!</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section  class="py-5" style="background-color: #ffffff;">
    <div class="container py-md-5">
        <div class="text-center mb-5">
            <h6 class="fw-bold text-uppercase" style="letter-spacing: 2px; color: #56B6C6;">Keunggulan Kami</h6>
            <h2 class="display-6 fw-bold" style="color: #170C79;">Mengapa In Rainbow Laundry?</h2>
        </div>

        <style>
            .why-card { transition: 0.3s ease; border-radius: 25px !important; background-color: #fcfaf2; border: 1px solid transparent; }
            .why-card:hover { transform: translateY(-10px); background-color: #ffffff !important; border-color: #56B6C6; box-shadow: 0 15px 30px rgba(23, 12, 121, 0.1) !important; }
            /* Menyesuaikan ukuran GIF/Icon di dalam kartu agar seragam */
            .why-icon { width: 100px; height: 100px; margin: 0 auto 1.5rem auto; display: block; object-fit: contain; }
        </style>

        <div class="row g-4 justify-content-center">
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center why-card" style="border-radius: 25px; background-color: #fcfaf2;">
                    <div class="mb-4 d-flex justify-content-center">
                        <svg class="anim-float" width="90" height="90" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="6" width="7" height="7" rx="1" stroke="#170C79" stroke-width="1.5"/>
                            <path d="M17 9h3" stroke="#170C79" stroke-width="1" stroke-linecap="round"/>
                            
                            <path d="M19 13v3a2 2 0 0 1-2 2H7.5L5 13H19z" stroke="#56B6C6" stroke-width="1.5" fill="#56B6C6" fill-opacity="0.1"/>
                            <path d="M5 13L3 9h4l1 4" stroke="#56B6C6" stroke-width="1.5"/>
                            
                            <circle cx="6.5" cy="18.5" r="2.5" stroke="#170C79" stroke-width="1.5"/>
                            <circle cx="17.5" cy="18.5" r="2.5" stroke="#170C79" stroke-width="1.5"/>
                            <circle cx="6.5" cy="18.5" r="1" fill="#170C79"/>
                            <circle cx="17.5" cy="18.5" r="1" fill="#170C79"/>
                            
                            <circle cx="4.5" cy="9.5" r="0.5" fill="#56B6C6"/>
                            <path d="M8 9V7.5a1.5 1.5 0 0 1 3 0V9" stroke="#56B6C6" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold text-navy mb-3">Siap Antar Jemput</h4>
                    <p class="text-muted small">Malas keluar rumah? Tenang, tim kurir motor kami siap menjemput pakaian kotor dan mengantarkannya kembali dengan cepat sampai ke depan pintu Anda.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center why-card">
                    <div class="mb-4 d-flex justify-content-center mt-3">
                        <svg class="anim-shake" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="1.5">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                            <circle cx="18" cy="9" r="3" stroke="#56B6C6" />
                        </svg>
                    </div>
                    <h4 class="fw-bold" style="color: #170C79;">Tim Profesional</h4>
                    <p class="text-muted small">Pakaian Anda ditangani oleh tenaga ahli berpengalaman. Kami memahami teknik pencucian yang benar untuk berbagai jenis bahan kain agar awet.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center why-card">
                    <div class="mb-4 d-flex justify-content-center mt-3">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#56B6C6" stroke-width="1.5">
                            <circle cx="12" cy="12" r="10" />
                            <path class="anim-spin" d="M12 6v6l4 2" stroke="#170C79" stroke-width="2" style="transform-origin: 12px 12px;"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold" style="color: #170C79;">Express 3 Jam</h4>
                    <p class="text-muted small">Butuh pakaian bersih dalam waktu singkat? Layanan Express kami menjamin cucian Anda selesai hanya dalam 3 jam tanpa mengurangi kualitas.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="form-pickup" class="position-relative d-flex align-items-center" style="min-height: 80vh; background: linear-gradient(rgba(23, 155, 174, 0.9), rgba(23, 155, 174, 0.9)), url('https://images.unsplash.com/photo-1545173168-9f1947eebb7f?q=80&w=2071&auto=format&fit=crop'); background-size: cover; background-position: center; background-attachment: fixed; padding: 80px 0;">
    
    <div class="container">
        <div class="row align-items-center justify-content-between">
            
            <!-- Kiri: Teks Promosi -->
            <div class="col-lg-5 text-white mb-5 mb-lg-0">
                <h1 class="fw-bold mb-4" style="font-size: 3.5rem; line-height: 1.1;">
                    Cucian di<br>rumah sudah<br>numpuk ?
                </h1>
                <p class="mb-4" style="font-size: 1.1rem; opacity: 0.9;">
                    Jangan ragu untuk menghubungi kami.<br>
                    Komunikasikan kebutuhan laundry Anda.
                </p>
                <a href="https://wa.me/6281234567890" target="_blank" class="btn text-white px-4 py-2 mt-2" style="background-color: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 5px; transition: 0.3s;">
                    Hubungi Kami
                </a>
            </div>

            <!-- Kanan: Card Form Reservasi -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg" style="border-radius: 8px;">
                    <div class="card-body p-4 p-md-5 position-relative">
                        
                        <form action="{{ route('reservasi.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                
                                <!-- Nama -->
                                <div class="col-md-6">
                                    <input type="text" class="form-control py-2 custom-input" placeholder="Nama" name="nama" required>
                                </div>
                                
                                <!-- WhatsApp -->
                                <div class="col-md-6">
                                    <input type="number" class="form-control py-2 custom-input" placeholder="No Whatsapp" name="no_hp" required>
                                </div>
                                
                                <!-- Alamat -->
                                <div class="col-12">
                                    <input type="text" class="form-control py-2 custom-input" placeholder="Alamat" name="alamat" required>
                                </div>
                                
                                <!-- Layanan -->
                                <div class="col-md-5">
                                    <select class="form-select py-2 custom-input" name="service_id" style="color: #179BAE;" required>
                                        <option value="" selected disabled>Daily Kiloan</option>
                                        <option value="1" style="color: #333;">Cuci Setrika Kiloan</option>
                                        <option value="2" style="color: #333;">Cuci Selimut</option>
                                        <option value="3" style="color: #333;">Cuci Sepatu</option>
                                    </select>
                                </div>
                                
                                <!-- Tanggal Jemput (Pake trik onfocus biar placeholder text tetep muncul sblm diklik) -->
                                <div class="col-md-4">
                                    <input type="text" class="form-control py-2 custom-input" placeholder="Tanggal Jemput" name="tgl_jemput" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                                </div>
                                
                                <!-- Jam Jemput -->
                                <div class="col-md-3">
                                    <input type="text" class="form-control py-2 custom-input" placeholder="Jam Jemput" name="jam_jemput" onfocus="(this.type='time')" onblur="(this.type='text')" required>
                                </div>

                                <!-- Pesan (Textarea) -->
                                <div class="col-12">
                                    <textarea class="form-control py-2 custom-input" rows="4" placeholder="Pesan" name="pesan"></textarea>
                                </div>
                                
                                <!-- Tombol Submit -->
                                <div class="col-12 mt-4 position-relative">
                                    <button type="submit" class="btn w-100 py-3 fw-bold text-white d-flex justify-content-center align-items-center gap-2" style="background-color: #179BAE; border-radius: 5px;">
                                        Pickup Now <i class="fa-solid fa-truck-fast"></i>
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    @keyframes draw { to { stroke-dashoffset: 0; } }
    .anim-draw { stroke-dashoffset: 100; stroke-dasharray: 100; animation: draw 3s linear infinite; }
</style>

<!-- SECTION TESTIMONI (Update: Clean White with Silhouette) -->
<section id="testimoni" class="py-5 position-relative" style="background-color: #ffffff; border-radius: 60px 60px 0 0; margin-top: 50px;">
    <!-- Siluet Mesin Cuci (Sea Blue Tipis) -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('https://img.icons8.com/ios/100/56B6C6/washing-machine.png'); background-repeat: repeat; background-size: 100px; opacity: 0.04; z-index: 0;"></div>

    <div class="container position-relative py-5" style="z-index: 1;">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold" style="color: #170C79;">Apa Kata Pelanggan Setia Kami?</h2>
        </div>

        <div class="row g-4 justify-content-center">
            @php
                $testimonis = [
                    ['nama' => 'Radya Ananta Vikrama', 'initial' => 'RA', 'bg' => '#170C79', 'border' => '#56B6C6', 'text' => 'In Rainbow Laundry tempat laundry andalan, punya layanan terbaik karena bisa express!'],
                    ['nama' => 'Salsabila Septia Gunawan', 'initial' => 'SS', 'bg' => '#56B6C6', 'border' => '#170C79', 'text' => 'Penyelamat banget buat yang suka lupa nyuci. Hasilnya langsung bersih dan wangi.'],
                    ['nama' => 'Lillian Bell', 'initial' => 'LB', 'bg' => '#170C79', 'border' => '#56B6C6', 'text' => 'Cepat, tepat, wangi, rapi, dan ada delivery servicenya. Ga khawatir kehabisan baju!']
                ];
            @endphp

            @foreach($testimonis as $t)
            <div class="col-md-4">
                <div class="card border-0 h-100 shadow-sm text-center p-4 position-relative" style="border-radius: 20px; padding-top: 60px !important; background-color: #fcfaf2;">
                    <div class="position-absolute top-0 start-50 translate-middle-x mt-3">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="#56B6C6" opacity="0.4">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.437.917-4.016 3.638-4.016 5.849h3.983v10h-9.967z"/>
                        </svg>
                    </div>
                    <p class="text-muted small mb-4 italic">"{{ $t['text'] }}"</p>
                    <div class="mt-auto">
                        <div class="mb-2 text-warning small">★★★★★</div>
                        <div class="d-flex justify-content-center mb-2">
                             <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-sm" style="width: 55px; height: 55px; background: {{ $t['bg'] }}; border: 3px solid {{ $t['border'] }};">
                                {{ $t['initial'] }}
                             </div>
                        </div>
                        <h6 class="fw-bold text-navy mb-0 small">{{ $t['nama'] }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.footer')




<script>
let lastScrollTop = 0;
const navbar = document.querySelector(".navbar");

window.addEventListener("scroll", function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // kasih threshold biar ga sensitif
    if (scrollTop > lastScrollTop && scrollTop > 50) {
        navbar.classList.add("hide");
    } else {
        navbar.classList.remove("hide");
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>