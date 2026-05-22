<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran In Rainbow Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center py-4" style="min-height: 100vh;">

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
                
                <div class="mb-3 p-2 rounded" style="background-color: #f8d7da; border: 1px solid #f5c2c7;">
                <small class="text-danger fw-bold d-block mb-1">Selesaikan pembayaran dalam:</small>
                <h4 id="countdown" class="fw-bold text-danger mb-0">24:00:00</h4>
            </div>

            <form action="{{ route('dummy.proses', $member->id) }}" method="POST">
                @csrf
                
                <div class="mb-3 text-start">
                    <label class="form-label text-muted" style="font-size: 13px; font-weight: bold;">Pilih Metode Pembayaran</label>
                    <select class="form-select border-secondary" name="metode_pembayaran" id="pilihMetode" required>
                        <option value="" disabled selected>Pilih bank / e-wallet...</option>
                        <option value="QRIS">QRIS (GoPay, OVO, Dana, ShopeePay)</option>
                        <option value="BCA Virtual Account">BCA Virtual Account</option>
                        <option value="Mandiri Virtual Account">Mandiri Virtual Account</option>
                        <option value="BNI Virtual Account">BNI Virtual Account</option>
                        <option value="Alfamart / Indomaret">Alfamart / Indomaret</option>
                    </select>
                </div>

                <div id="qrisContainer" class="text-center mb-4 d-none">
                    <p class="text-muted small mb-2">Scan QR Code di bawah ini:</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=Tagihan-Member-{{ $member->id }}" alt="QRIS Dapi Laundry" class="img-fluid border p-2 rounded shadow-sm">
                </div>

                <button type="submit" id="btnBayar" class="btn text-white w-100 fw-bold py-2" style="background-color: #179BAE;">
                    ✅ Simulasikan Pembayaran Lunas
                </button>
            </form>
            
        </div>
    </div>

    <script>
        // 1. LOGIKA BUAT NAMPILIN QRIS
        const selectMetode = document.getElementById('pilihMetode');
        const qrisContainer = document.getElementById('qrisContainer');

        selectMetode.addEventListener('change', function() {
            if (this.value === 'QRIS') {
                qrisContainer.classList.remove('d-none'); // Munculin QRIS
            } else {
                qrisContainer.classList.add('d-none'); // Sembunyiin QRIS
            }
        });

        // 2. LOGIKA COUNTDOWN TIMER 24 JAM
        // Ngambil batas waktu dari Controller tadi
        const countDownDate = new Date("{{ $batasWaktu }}").getTime();

        const x = setInterval(function() {
            const now = new Date().getTime();
            const distance = countDownDate - now;

            // Perhitungan hari, jam, menit, detik
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Nampilin ke layar HTML
            document.getElementById("countdown").innerHTML = 
                (hours < 10 ? "0" + hours : hours) + " Jam : " + 
                (minutes < 10 ? "0" + minutes : minutes) + " Menit : " + 
                (seconds < 10 ? "0" + seconds : seconds) + " Detik";

            // Kalau waktunya abis
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "WAKTU HABIS";
                document.getElementById("btnBayar").disabled = true; // Tombol bayar dimatiin
                document.getElementById("btnBayar").innerHTML = "❌ Pembayaran Kadaluarsa";
                document.getElementById("btnBayar").style.backgroundColor = "#dc3545";
            }
        }, 1000);
    </script>
</body>
</html>