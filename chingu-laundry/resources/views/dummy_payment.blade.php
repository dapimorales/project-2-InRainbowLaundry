<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran In Rainbow Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="card shadow border-0" style="width: 400px; border-radius: 15px;">
        <div class="card-body p-4 text-center">
            <h4 class="fw-bold mb-1" style="color: #179BAE;">In Rainbow Laundry</h4>
            <p class="text-muted small mb-4">Invoice Membership: #MEM-{{ $member->id }}</p>

            <div class="mb-4 text-start bg-light p-3 rounded border">
                <p class="mb-1"><strong>Nama:</strong> {{ $member->nama_lengkap }}</p>
                <p class="mb-1"><strong>Paket:</strong> {{ strtoupper($member->paket) }}</p>
                <h3 class="fw-bold text-success mt-2">Rp {{ number_format($member->harga, 0, ',', '.') }}</h3>
            </div>

            <p class="text-muted small mb-3">
                *Ini adalah simulasi Payment Gateway. Klik tombol di bawah untuk pura-pura bayar lunas.*
            </p>

            <form action="{{ route('dummy.proses', $member->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn text-white w-100 fw-bold py-2" style="background-color: #179BAE;">
                    ✅ Simulasikan Pembayaran Lunas
                </button>
            </form>
            
        </div>
    </div>

</body>
</html>