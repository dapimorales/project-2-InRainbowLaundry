<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Rainbow Laundry - No. 1 Laundry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfaf2; color: #333; margin: 0; }
        .hero { background: linear-gradient(135deg, #EFE3CA 0%, #ffffff 100%); padding: 20px 0 60px 0; }
        .navbar { background-color: #ffffff !important; }
        .text-navy { color: #170C79; }
        .btn-navy { background-color: #170C79; color: #EFE3CA; border-radius: 50px; font-weight: bold; }
        .btn-navy:hover { background-color: #56B6C6; color: #170C79; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">
            <span style="color: #170C79;">IN</span> 
            <span style="color: #56B6C6;">RAINBOW</span> 
            <span style="color: #8ACBD0;">LAUNDRY</span>
        </a>
        <div class="ms-auto d-flex align-items-center">
            <a href="/layanan" class="nav-link me-4 fw-bold text-navy">Dashboard Admin</a>
            <a href="#" class="btn btn-navy px-4">Reservasi</a>
        </div>
    </div>
</nav>

<section class="hero overflow-hidden" style="background: linear-gradient(135deg, #EFE3CA 0%, #ffffff 100%); padding: 0;">
    <div class="container-fluid p-0">
        <div class="row g-0 align-items-center">
            
            <div class="col-md-5 py-5" style="padding-left: 8%; padding-right: 5%;">
                <h1 class="display-4 fw-bold text-navy mb-3" style="line-height: 1.2;">
                    No. 1 Laundry Express<br>di Bugel
                </h1>
                <p class="lead mb-4 text-muted">
                    In Rainbow Laundry: Bersih, Wangi, Higienis, dan Tepat Waktu untuk kebutuhan harianmu.
                </p>
                <div class="d-flex gap-3">
                    <div class="bg-white p-3 rounded shadow-sm border text-center">
                        <small class="text-muted d-block">Mulai Dari</small>
                        <strong class="text-navy fs-5">IDR 5.000</strong>
                    </div>
                    <div class="bg-white p-3 rounded shadow-sm border text-center">
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

                <form action="#" class="row g-3">
                    <div class="col-md-4"><input type="text" class="form-control form-custom" placeholder="Nama Lengkap"></div>
                    <div class="col-md-4"><input type="text" class="form-control form-custom" placeholder="Alamat Jemput"></div>
                    <div class="col-md-4"><input type="number" class="form-control form-custom" placeholder="WhatsApp"></div>
                    <div class="col-md-4">
                        <select class="form-select form-custom">
                            <option selected disabled>Pilih Layanan</option>
                            <option>Daily Kiloan</option>
                            <option>Cuci & Setrika</option>
                            <option>Laundry Sepatu</option>
                        </select>
                    </div>
                    <div class="col-md-4"><input type="date" class="form-control form-custom"></div>
                    <div class="col-md-4"><input type="time" class="form-control form-custom"></div>

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

<section class="py-5" style="background-color: #ffffff;">
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

<section class="py-5" style="background-color: #fcfaf2;">
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

<section class="py-5" style="background-color: #ffffff;">
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

<section class="py-5" style="background: linear-gradient(#efe3cae6, #56B6C6), url('https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?q=80&w=2070&auto=format&fit=crop'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container py-md-5">
        <div class="row align-items-center">
            
            <div class="col-md-6 text-white mb-5 mb-md-0">
                <h2 class="display-5 fw-bold mb-4" style="line-height: 1.2;">
                    Antar Jemput - <br>
                    Maksimal 30 Menit <br>
                    Dipickup
                </h2>
                <p class="lead opacity-90 mb-4" style="text-align: justify; font-size: 1.1rem;">
                    Kami memahami bahwa kenyamanan Anda adalah prioritas kami. Oleh karena itu, kami menyediakan layanan antar-jemput gratis dengan waktu penjemputan maksimal 30 menit setelah Anda melakukan pemesanan. Hubungi kami atau pesan melalui aplikasi, dan kami akan segera datang untuk mengambil cucian Anda.
                </p>
                <a href="#" class="btn btn-light text-navy fw-bold px-5 py-3 shadow" style="border-radius: 15px; color: #170C79;">
                    Pesan Sekarang 🛵
                </a>
            </div>

            <div class="col-md-6">
                <div class="position-relative p-4 text-center">
                    <svg viewBox="0 0 500 400" fill="none" xmlns="http://www.w3.org/2000/svg" class="img-fluid anim-float" style="max-width: 450px;">
                        <rect x="100" y="20" width="220" height="350" rx="30" fill="#ffffff" stroke="#170C79" stroke-width="8"/>
                        <rect x="115" y="40" width="190" height="310" rx="15" fill="#f8f9fa"/>
                        
                        <path d="M130 300 C 180 300, 180 150, 280 150" stroke="#170C79" stroke-width="4" stroke-dasharray="8 4" class="anim-draw"/>
                        
                        <circle cx="130" cy="300" r="10" fill="#170C79"/>
                        <circle cx="280" cy="150" r="10" fill="#E74C3C"/>
                        
                        <g transform="translate(250, 180) scale(1.2)">
                            <path d="M10 50 L5 30 H25 L35 50 H10Z" fill="#170C79"/>
                            <rect x="25" y="30" width="15" height="15" rx="2" fill="#ffffff" stroke="#170C79" stroke-width="2"/> <circle cx="12" cy="55" r="5" fill="#333"/> <circle cx="33" cy="55" r="5" fill="#333"/> <path d="M5 30 L0 20 H10 L10 30" stroke="#170C79" stroke-width="2"/> </g>
                    </svg>

                    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-5">
                        <div class="bg-white p-3 shadow rounded-4 border-start border-danger border-4" style="min-width: 150px;">
                            <strong class="text-navy fs-5">OnTheWay</strong>
                        </div>
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

<section class="py-5 position-relative" style="background: linear-gradient(#efe3cae6, #56B6C6), url('https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?q=80&w=2070&auto=format&fit=crop'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container py-5">
        
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold" style="color: #170C79;">Apa Kata Pelanggan Setia Kami?</h2>
        </div>

        <div class="row g-4 justify-content-center">
            
            <div class="col-md-4">
                <div class="card border-0 h-100 shadow-sm text-center p-4 position-relative" style="border-radius: 20px; padding-top: 60px !important; background-color: #ffffff;">
                    <div class="position-absolute top-0 start-50 translate-middle-x mt-3">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="#56B6C6" opacity="0.4">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.437.917-4.016 3.638-4.016 5.849h3.983v10h-9.967z"/>
                        </svg>
                    </div>
                    
                    <p class="text-muted small mb-4 italic">"In Rainbow Laundry tempat laundry andalan, punya layanan terbaik karena bisa express, harganya terjangkau mana bisa di antar jemput lagi!"</p>
                    
                    <div class="mt-auto">
                        <div class="mb-2 text-warning">★★★★★</div>
                        <div class="d-flex justify-content-center mb-2">
                             <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white" style="width: 60px; height: 60px; background: #170C79; border: 3px solid #56B6C6; font-size: 1.2rem;">RA</div>
                        </div>
                        <h6 class="fw-bold text-navy mb-0">Radya Ananta Vikrama</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 h-100 shadow-sm text-center p-4 position-relative" style="border-radius: 20px; padding-top: 60px !important; background-color: #ffffff;">
                    <div class="position-absolute top-0 start-50 translate-middle-x mt-3">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="#56B6C6" opacity="0.4">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.437.917-4.016 3.638-4.016 5.849h3.983v10h-9.967z"/>
                        </svg>
                    </div>
                    
                    <p class="text-muted small mb-4">"Penyelamat banget buat yang suka lupa nyuci. Hasil nyucinya bisa langsung diambil dalam waktu singkat, udah gitu pasti bersih dan wangi."</p>
                    
                    <div class="mt-auto">
                        <div class="mb-2 text-warning">★★★★★</div>
                        <div class="d-flex justify-content-center mb-2">
                             <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white" style="width: 60px; height: 60px; background: #56B6C6; border: 3px solid #170C79; font-size: 1.2rem;">SS</div>
                        </div>
                        <h6 class="fw-bold text-navy mb-0">Salsabila Septia Gunawan</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 h-100 shadow-sm text-center p-4 position-relative" style="border-radius: 20px; padding-top: 60px !important; background-color: #ffffff;">
                    <div class="position-absolute top-0 start-50 translate-middle-x mt-3">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="#56B6C6" opacity="0.4">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.437.917-4.016 3.638-4.016 5.849h3.983v10h-9.967z"/>
                        </svg>
                    </div>
                    
                    <p class="text-muted small mb-4">"Cepat, tepat, wangi, rapi, dan ada delivery servicenya. Ada In Rainbow Laundry saya ga khawatir kehabisan baju. Mantap!"</p>
                    
                    <div class="mt-auto">
                        <div class="mb-2 text-warning">★★★★★</div>
                        <div class="d-flex justify-content-center mb-2">
                             <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white" style="width: 60px; height: 60px; background: #170C79; border: 3px solid #56B6C6; font-size: 1.2rem;">LB</div>
                        </div>
                        <h6 class="fw-bold text-navy mb-0">Lillian Bell</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<footer class="py-5 position-relative" style="background-color: #fcfaf2; border-top: 5px solid #56B6C6;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('https://img.icons8.com/ios/100/170C79/washing-machine.png'); background-repeat: repeat; background-size: 80px; opacity: 0.02; z-index: 0;"></div>

    <div class="container position-relative" style="z-index: 1;">
        <div class="row g-4">
            
            <div class="col-md-4">
                <h4 class="fw-bold mb-3">
                    <span style="color: #170C79;">IN</span> 
                    <span style="color: #56B6C6;">RAINBOW</span>
                </h4>
                <p class="text-muted small mb-4" style="text-align: justify;">
                    <strong>In Rainbow Laundry</strong> adalah layanan laundry profesional yang mengutamakan kebersihan dan kepuasan pelanggan dengan prinsip bersih, rapi, wangi, higienis & tepat waktu.
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-navy rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #170C79; color: white;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-navy rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #170C79; color: white;"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-navy rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #170C79; color: white;"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <div class="col-md-4 ps-md-5">
                <h6 class="fw-bold text-navy mb-4">Menu</h6>
                <ul class="list-unstyled text-muted small">
                    <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Beranda</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Layanan</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Kemitraan</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Cek Status Cucian</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold text-navy mb-4">Kontak</h6>
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3 text-sea"><i class="fas fa-phone-alt"></i></div>
                    <span class="text-muted small">0812-xxxx-xxxx</span>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3 text-sea"><i class="fas fa-envelope"></i></div>
                    <span class="text-muted small">halo@inrainbowlaundry.com</span>
                </div>
            </div>

        </div>
    </div>
</footer>

<div class="py-3" style="background-color: #56B6C6; color: #fcfaf2;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start small fw-bold">
                Copyright © In Rainbow Laundry 2026
            </div>
            <div class="col-md-6 text-center text-md-end small">
                <span class="fw-bold ms-2 d-inline-flex align-items-center">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#170C79" stroke-width="2" class="me-2">
                        <path d="M4 3h16a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/>
                        <circle cx="12" cy="13" r="5" stroke-dasharray="2 2"/>
                    </svg>
                    In Rainbow Laundry
                </span>
            </div>
        </div>
    </div>
</div>

</body>
</html>