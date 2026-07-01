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
            
            
            <a href="#" class="btn btn-navy px-4" data-bs-toggle="modal" data-bs-target="#modalReservasiNavbar">
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
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/') }}#tentang-kami">Tentang Kami</a></li>
                        <li><a class="dropdown-item" href="{{ url('/') }}#layanan-kami">Layanan Kami</a></li>
                        <li><a class="dropdown-item" href="{{ url('/') }}#form-pickup">Jadwalkan Penjemputan</a></li>
                        <li><a class="dropdown-item" href="{{ url('/') }}#testimoni">Testimoni</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-navy fw-semibold" href="{{ route('cek-status.index') }}">Cek Status Cucianmu</a>
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
<div class="modal fade" id="modalReservasiNavbar" tabindex="-1" aria-labelledby="modalReservasiNavbarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            
            <div class="modal-header border-0 pb-0 position-relative p-4">
                <h3 class="modal-title fw-bold" id="modalReservasiNavbarLabel" style="color: #179BAE;">Reservasi Laundry</h3>
                <button type="button" class="btn-close position-absolute top-0 end-0 mt-4 me-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-4 pt-2">
                <form action="{{ route('reservasi.ambil_bersih') }}" method="POST">
                @csrf
            <div class="row g-4">
        
        <div class="col-md-6">
            <input type="text" class="form-control py-2 custom-modal-input" placeholder="Nama" name="nama" required>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control py-2 custom-modal-input" placeholder="Alamat" name="alamat" required>
        </div>
        
        <div class="col-md-6">
            <input type="number" class="form-control py-2 custom-modal-input" placeholder="Whatsapp" name="no_hp" required>
        </div>
        <div class="col-md-6">
            <select class="form-select py-2 custom-modal-input" name="service_id" style="color: #6c757d;" required>
                <option value="" selected disabled>Pilih Layanan</option>
                <option value="1">Cuci Setrika Kiloan</option>
                <option value="2">Cuci Selimut</option>
                <option value="3">Cuci Sepatu</option>
            </select>
        </div>

       
        
        <div class="col-md-6">
            <input type="text" class="form-control py-2 custom-modal-input" placeholder="Tanggal Penjemputan" name="tgl_jemput" onfocus="(this.type='date')" onblur="(this.type='text')" required>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control py-2 custom-modal-input" placeholder="Jam Penjemputan" name="jam_jemput" onfocus="(this.type='time')" onblur="(this.type='text')" required>
        </div>

        <div class="col-12 mt-4">
            <button type="submit" class="btn text-white px-4 py-2 fw-bold" style="background-color: #179BAE; border-radius: 6px;">
                Pickup Sekarang <i class="fa-solid fa-truck-fast ms-1"></i>
            </button>
        </div>

    </div>
</form>
            </div>
        </div>
    </div>
</div>
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