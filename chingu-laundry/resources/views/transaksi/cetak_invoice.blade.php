<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk - {{ $order->kode_invoice }}</title>
    <style>
        @page {
            margin: 0;
            size: 80mm auto; 
        }

        body { 
            font-family: 'Courier New', Courier, monospace; 
            color: #000; 
            font-size: 15px; /* <-- UDAH DIGEDEIN dari 12px ke 15px */
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .struk-container { 
            width: 80mm; 
            padding: 15px; 
            box-sizing: border-box; 
            margin: 0 auto; /* <-- INI KUNCI BIAR POSISINYA DI TENGAH */
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .fw-bold { font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td { padding: 4px 0; }
        .border-top { border-top: 1px dashed #000; }
        .border-bottom { border-bottom: 1px dashed #000; }
        .mt-2 { margin-top: 10px; }
        .mb-2 { margin-bottom: 10px; }

        @media print {
            body { background-color: #fff; }
            .struk-container { margin: 0 auto; border: none; } /* <-- TETAP DI TENGAH SAAT DI-PRINT */
            .no-print { display: none !important; } 
        }
    </style>
</head>
<body onload="window.print()">
    <div class="no-print" style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
        <a href="{{ route('transaksi.index') }}" 
           style="background-color: #6c757d; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px; font-family: sans-serif; font-size: 14px;">
           ⬅ Kembali ke Data Transaksi
        </a>
    </div>
    <div class="struk-container">
        
        <div class="text-center fw-bold mb-2">
            <h3 style="margin:0;">IN RAINBOW LAUNDRY</h3>
            <p style="margin:0; font-size: 12px;">Jl. Bugel mas indah, Tangerang</p>
            <p style="margin:0; font-size: 12px;">WA: +62 857-1046-5321</p>
        </div>

        <div class="border-top border-bottom" style="padding: 5px 0;">
            <table style="font-size: 12px;">
                <tr>
                    <td>Invoice</td>
                    <td>: <span class="fw-bold">{{ $order->kode_invoice }}</span></td>
                </tr>
                <tr>
                    <td>Pelanggan</td>
                    <td>: {{ $order->customer->nama }}</td>
                </tr>
                <tr>
                    <td>Tgl Jemput</td>
                    <td>: {{ \Carbon\Carbon::parse($order->tgl_masuk)->format('d M Y, H:i') }}</td>
                </tr>
            </table>
        </div>

        <table>
            @foreach($order->orderDetails as $detail)
            <tr>
                <td colspan="2" class="fw-bold">{{ $detail->service->nama_layanan ?? 'Layanan' }}</td>
            </tr>
            <tr>
                <td>{{ $detail->qty }} x Rp {{ number_format($detail->service->harga ?? 0, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>

        <table class="border-top mt-2 fw-bold">
            <tr>
                <td>TOTAL</td>
                <td class="text-right">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
            </tr>
        </table>

        <div class="text-center mt-2 border-top" style="font-size: 12px; padding-top: 10px;">
            <p style="margin-bottom: 5px;">Terima kasih telah mencuci di<br>In Rainbow Laundry!</p>
            <p style="margin:0; font-style: italic;">Gunakan No. Invoice di atas untuk melacak status cucian Anda di website kami.</p>
        </div>
        
    </div>
</body>
</html>