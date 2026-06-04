<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Membership</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .text-center { text-align: center; margin-bottom: 20px; }
        
        /* JURUS TABEL LAYOUT ANTI MLOROT */
        .layout-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .layout-table td { border: none; padding: 0; vertical-align: top; width: 50%; }

        /* Gaya Kotak Rekap */
        .rekap-box { 
            padding: 15px; 
            color: white; 
            border-radius: 5px;
        }
        .bg-green { background-color: #198754; }
        .bg-blue { background-color: #179BAE; }
        .rekap-title { font-size: 12px; margin-bottom: 5px; }
        .rekap-value { font-size: 20px; font-weight: bold; margin: 0; }

        /* Gaya Tabel Data Asli */
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table th, .data-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .data-table th { background-color: #179BAE; color: white; }
    </style>
</head>
<body>

    <div class="text-center">
        <h2>Laporan Data Membership</h2>
        <p>IN RAINBOW LAUNDRY</p>
    </div>

    <table class="layout-table">
        <tr>
            <td style="padding-right: 10px;">
                <div class="rekap-box bg-green">
                    <div class="rekap-title">Total Pendapatan Membership</div>
                    <div class="rekap-value">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                </div>
            </td>
            <td style="padding-left: 10px;">
                <div class="rekap-box bg-blue">
                    <div class="rekap-title">Total Member Aktif</div>
                    <div class="rekap-value">{{ $totalMember }} Orang</div>
                </div>
            </td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Member</th>
                <th>No. WhatsApp</th>
                <th>Paket</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($memberships as $index => $m)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $m->nama_lengkap }}</td>
                <td>{{ $m->nomor_whatsapp }}</td>
                <td>{{ strtoupper($m->paket) }}</td>
                <td>{{ $m->created_at ? \Carbon\Carbon::parse($m->created_at)->format('d M Y') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>