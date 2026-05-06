<style>
    body { 
        font-family: 'Poppins', sans-serif; 
        background-color: #fcfaf2; 
        color: #333; 
        margin: 0; 
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

    .navbar.hide {
        transform: translateY(-100%);
    }

    .text-navy { color: #170C79; }
    
    .btn-navy { 
        background-color: #170C79; 
        color: #EFE3CA; 
        border-radius: 50px; 
        font-weight: bold; 
        border: none;
        transition: 0.3s;
    }
    
    .btn-navy:hover { 
        background-color: #56B6C6; 
        color: #170C79; 
    }

    /* Dropdown Hover Effect */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        pointer-events: auto;
    }

    .dropdown-menu {
        display: block;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s ease;
        pointer-events: none;
        border-radius: 15px !important;
        border: none !important;
    }

    .dropdown-item {
        color: #170C79;
        font-weight: 500;
        border-radius: 10px;
        transition: 0.2s;
    }

    .dropdown-item:hover {
        background-color: #56B6C6;
        color: #ffffff;
        transform: translateX(5px);
    }
</style>

<nav class="navbar navbar-expand-lg shadow-sm py-3">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-4" href="{{ url('/') }}">
            <span style="color: #170C79;">IN</span> 
            <span style="color: #56B6C6;">RAINBOW</span> 
            <span style="color: #8ACBD0;">LAUNDRY</span>
        </a>

        <!-- RIGHT SIDE (Reservasi & Burger) -->
        <div class="d-flex align-items-center order-lg-2">
            <a href="/layanan" class="nav-link me-3 fw-bold text-navy d-none d-lg-block">
                Dashboard Admin
            </a>
            
            <a href="#form-reservasi" class="btn btn-navy px-4">
                Reservasi
            </a>

            <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- MENU (Outlet & Kemitraan SUDAH DIHAPUS) -->
        <div class="collapse navbar-collapse order-lg-1" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-2">
                <!-- Dropdown Beranda -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-navy fw-semibold" 
                        href="{{ url('/') }}" 
                        id="berandaDropdown">
                        Beranda
                    </a>
                    <ul class="dropdown-menu shadow p-3">
                        <li><a class="dropdown-item py-2" href="#about-us">Tentang Kami</a></li>
                        <li><a class="dropdown-item py-2" href="#layanan">Layanan Kami</a></li>
                        <li><a class="dropdown-item py-2" href="#form-reservasi">Jadwalkan Penjemputan</a></li>
                        <li><a class="dropdown-item py-2" href="#testimoni">Testimoni</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-navy fw-semibold" href="#">Cek Status Cucianmu</a>
                </li>
                
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

        if (scrollTop > lastScrollTop && scrollTop > 50) {
            navbar.classList.add("hide");
        } else {
            navbar.classList.remove("hide");
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
</script>