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

<section class="reservasi-section" style="margin-top: -80px; position: relative; z-index: 20; padding-bottom: 50px;">
    <div class="container">
        <div class="card border-0 shadow-lg p-4 p-md-5" style="border-radius: 30px; background: #ffffff; box-shadow: 0 20px 60px rgba(23, 12, 121, 0.15) !important;">
            <div class="row">
                
                <div class="col-12 mb-4">
                    <h3 class="fw-bold text-navy mb-1">Reservasi Laundry</h3>
                    <p class="text-muted small">Isi data di bawah, kurir kami akan segera menjemput pakaianmu.</p>
                </div>

                <form action="#" class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control form-custom" placeholder="Nama Lengkap">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control form-custom" placeholder="Alamat Jemput">
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control form-custom" placeholder="Nomor WhatsApp (Aktif)">
                    </div>

                    <div class="col-md-4">
                        <select class="form-select form-custom">
                            <option selected disabled>Pilih Layanan</option>
                            <option>Daily Kiloan</option>
                            <option>Cuci & Setrika</option>
                            <option>Laundry Sepatu</option>
                            <option>Laundry Tas</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control form-custom">
                    </div>
                    <div class="col-md-4">
                        <input type="time" class="form-control form-custom">
                    </div>

                    <div class="col-12 mt-4 text-end">
                        <button type="submit" class="btn btn-navy px-5 py-3 shadow-sm" style="border-radius: 15px; background-color: #170C79; color: white;">
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


</body>
</html>