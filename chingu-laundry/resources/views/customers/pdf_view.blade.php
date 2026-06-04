<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pelanggan</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .text-center { text-align: center; margin-bottom: 20px; }
        
        .rekap-box { 
            padding: 15px; 
            color: white; 
            background-color: #179BAE; 
            border-radius: 5px;
            width: 50%;
            margin: 0 auto 20px auto;
            text-align: center;
        }
        .rekap-title { font-size: 14px; margin-bottom: 5px; }
        .rekap-value { font-size: 24px; font-weight: bold; margin: 0; }

        .data-table { width: 100%; border-collapse: collapse; }
        .data-table th, .data-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .data-table th { background-color: #179BAE; color: white; }
    </style>
</head>
<body>

    <div class="text-center">
        <h2>Laporan Data Pelanggan Reguler</h2>
        <p>IN RAINBOW LAUNDRY</p>
    </div>

    <div class="rekap-box">
        <div class="rekap-title">Total Keseluruhan Pelanggan</div>
        <div class="rekap-value">{{ $totalCustomer }} Orang</div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>No. WhatsApp</th>
                <th>Alamat</th>
                <th>Terdaftar Sejak</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $index => $c)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $c->nama }}</td>
                <td>{{ $c->no_hp }}</td>
                <td>{{ $c->alamat }}</td>
                <td>{{ $c->created_at ? \Carbon\Carbon::parse($c->created_at)->format('d M Y') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>