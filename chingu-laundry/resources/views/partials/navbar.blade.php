<style>
    body { 
        font-family: 'Poppins', sans-serif; 
        background-color: #fcfaf2; 
        color: #333; 
        margin: 0; 
        /* Pastikan padding ini ada biar konten nggak tenggelam */
        padding-top: 90px !important; 
    }
    
    .navbar { 
    background-color: #ffffff !important; 
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
    transition: transform 0.3s ease-in-out;
    }

    /* Efek hide */
    .navbar.hide {
        transform: translateY(-100%);
    }

    .hero { 
        background: linear-gradient(135deg, #EFE3CA 0%, #ffffff 100%); 
        padding: 20px 0 60px 0;
        position: relative; /* Pastikan konten hero ada di bawah navbar */
    }
    
    .text-navy { color: #170C79; }
    
    .btn-navy { 
        background-color: #170C79; 
        color: #EFE3CA; 
        border-radius: 50px; 
        font-weight: bold; 
    }
    
    .btn-navy:hover { 
        background-color: #56B6C6; 
        color: #170C79; 
    }
    /* Biar dropdown muncul saat hover */
.nav-item.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
    opacity: 1;
    visibility: visible;
}

/* Default hidden (biar bisa animasi) */
.dropdown-menu {
    display: block;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
    pointer-events: none;
}
.dropdown-item {
    color: #170C79; /* sama kayak navbar */
    font-weight: 500;
    border-radius: 10px;
    transition: 0.2s;
}

.dropdown-item:hover {
    background-color: #56B6C6; /* warna hover navbar */
    color: #ffffff;
    transform: translateX(5px);
}
/* Animasi naik halus */
.nav-item.dropdown:hover .dropdown-menu {
    transform: translateY(0);
    pointer-events: auto;
}
.nav-item.dropdown {
    position: relative;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm py-3 bg-white">
    <!-- Wrapper biar rapi -->
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-4" href="#">
            <span style="color: #170C79;">IN</span> 
            <span style="color: #56B6C6;">RAINBOW</span> 
            <span style="color: #8ACBD0;">LAUNDRY</span>
        </a>

        <!-- RIGHT SIDE (SELALU MUNCUL) -->
        <div class="d-flex align-items-center order-lg-2">
            <a href="/layanan" class="nav-link me-3 fw-bold text-navy d-none d-lg-block">
                Dashboard Admin
            </a>
            
           <a href="#form-reservasi" class="btn btn-navy px-4">
                Reservasi
            </a>

            <!-- Burger -->
            <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- MENU (MASUK BURGER) -->
        <div class="collapse navbar-collapse order-lg-1" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-2">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-navy fw-semibold" 
                    href="{{ url('/') }}" 
                    id="berandaDropdown" 
                    role="button" 
                    aria-expanded="false">
                        Beranda
                </a>

            <ul class="dropdown-menu shadow border-0 p-3" aria-labelledby="berandaDropdown" style="border-radius: 15px;">
                    <li><a class="dropdown-item py-2" href="#">Tentang Kami</a></li>
                    <li><a class="dropdown-item py-2" href="#">Layanan Kami</a></li>
                    <li><a class="dropdown-item py-2" href="#">Jadwalkan Penjemputan</a></li>
                    <li><a class="dropdown-item py-2" href="#">Testimoni</a></li>
                </ul>
                </li>
                <li class="nav-item"><a class="nav-link text-navy fw-semibold" href="#">Outlet</a></li>
                <li class="nav-item"><a class="nav-link text-navy fw-semibold" href="#">Kemitraan</a></li>
                <li class="nav-item"><a class="nav-link text-navy fw-semibold" href="#">Cek Status Cucianmu</a></li>
                <li class="nav-item">
                    <a class="nav-link text-navy fw-semibold" href="{{ route('syarat.ketentuan') }}">
                        Syarat & Ketentuan
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

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