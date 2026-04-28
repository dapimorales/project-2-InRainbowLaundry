<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Rainbow Laundry - Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #ffffff; box-shadow: 0 2px 4px rgba(0,0,0,.05); }
        .sidebar { min-height: 100vh; background: #fff; border-right: 1px solid #dee2e6; }
        .nav-link { color: #333; font-weight: 500; }
        .nav-link.active { color: #0d6efd; background: #e9ecef; border-radius: 8px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg mb-4">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/">
            <span style="color: #6366f1;">IN</span> 
            <span style="color: #ec4899;">RAINBOW</span> 
            <span class="text-dark">LAUNDRY</span>
        </a>
    </div>
</nav>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar p-3">
            <ul class="nav flex-column gap-2">
                <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Pelanggan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Transaksi</a></li>
            </ul>
        </nav>

        <main class="col-md-10 px-md-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>