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

<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pe-md-5">
                <h1 class="display-4 fw-bold text-navy mb-3">No. 1 Laundry Express di Indonesia</h1>
                <p class="lead mb-4">In Rainbow Laundry: Bersih, Wangi, Higienis, dan Tepat Waktu untuk kebutuhan harianmu.</p>
                <div class="d-flex gap-3">
                    <div class="bg-white p-3 rounded shadow-sm border text-center">
                        <small class="text-muted d-block">Mulai Dari</small>
                        <strong class="text-navy fs-5">IDR 7.000</strong>
                    </div>
                    <div class="bg-white p-3 rounded shadow-sm border text-center">
                        <small class="text-muted d-block">Layanan</small>
                        <strong class="text-navy fs-5">Express 3 Jam</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center mt-5 mt-md-0">
                <div style="max-width: 450px; margin: 0 auto;">
<div class="col-md-7 pe-0 mt-5 mt-md-0 d-flex justify-content-end">
    <div style="width: 130%; /* Bikin container-nya lebih lebar dari kolomnya sendiri */
                margin-right: -15%; /* Tendang ke kanan luar layar */
                border-radius: 40px 0 0 40px; 
                overflow: hidden; 
                box-shadow: -20px 20px 50px rgba(23, 12, 121, 0.2);">
        
        <video autoplay loop muted playsinline style="width: 100%; height: auto; display: block; object-fit: cover;">
            <source src="{{ asset('images/hero-laundry.mp4') }}" type="video/mp4">
            Browser kamu nggak support video.
        </video>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-5 text-navy">Layanan In Rainbow Laundry</h2>
        </div>
</section>

</body>
</html>