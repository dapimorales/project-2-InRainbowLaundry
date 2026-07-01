<table style="width: 100%; border-collapse: collapse;">
    <!-- BAGIAN JUDUL -->
    <tr>
        <th colspan="5" style="text-align: center; font-size: 18px;"><b>Laporan Pendapatan Bulanan</b></th>
    </tr>
    <tr>
        <th colspan="5" style="text-align: center; font-size: 14px;"><b>InRainbowLaundry</b></th>
    </tr>
    <tr>
        <td colspan="5"></td> <!-- Spasi kosong -->
    </tr>

    <!-- TABEL ATAS (REKAP BULANAN) -->
    <tr>
        <th style="border: 1px solid #000; background-color: #f2f2f2;">No</th>
        <!-- UBAH DI SINI: Simbol "&" diganti jadi "/" biar DOM Document nggak error -->
        <th style="border: 1px solid #000; background-color: #f2f2f2;">Bulan / Tahun</th>
        <th style="border: 1px solid #000; background-color: #f2f2f2;">Total Order / Transaksi</th>
        <th colspan="2" style="border: 1px solid #000; background-color: #f2f2f2;">Total Pendapatan (Lunas)</th>
    </tr>
    @forelse ($laporan as $index => $data)
        <tr>
            <td style="border: 1px solid #000; text-align: center;">{{ $index + 1 }}</td>
            <td style="border: 1px solid #000;">{{ $data->bulan_format }}</td>
            <td style="border: 1px solid #000; text-align: center;">{{ $data->total_transaksi }} Order</td>
            <td colspan="2" style="border: 1px solid #000;">Rp {{ number_format($data->total_pendapatan, 0, ',', '.') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" style="border: 1px solid #000; text-align: center;">Data laporan tidak ditemukan.</td>
        </tr>
    @endforelse

    <!-- JARAK ANTARA DUA TABEL -->
    <tr><td colspan="5"></td></tr>
    <tr><td colspan="5"></td></tr>

    <!-- TABEL BAWAH (RINCIAN PELANGGAN) -->
    <tr>
        <th colspan="5" style="text-align: center; font-size: 14px;"><b>Rincian Transaksi Lunas</b></th>
    </tr>
    <tr>
        <th style="border: 1px solid #000; background-color: #f2f2f2;">No</th>
        <th style="border: 1px solid #000; background-color: #f2f2f2;">Tanggal Order</th>
        <th style="border: 1px solid #000; background-color: #f2f2f2;">No Invoice</th>
        <th style="border: 1px solid #000; background-color: #f2f2f2;">Nama Pelanggan</th>
        <th style="border: 1px solid #000; background-color: #f2f2f2;">Nominal (Lunas)</th>
    </tr>
    @forelse ($detail_lunas as $index => $detail)
        <tr>
            <td style="border: 1px solid #000; text-align: center;">{{ $index + 1 }}</td>
            <td style="border: 1px solid #000;">{{ \Carbon\Carbon::parse($detail->tgl_masuk)->format('d M Y, H:i') }}</td>
            <td style="border: 1px solid #000;">{{ $detail->kode_invoice }}</td>
            <td style="border: 1px solid #000;">{{ $detail->customer->nama ?? 'Pelanggan Umum' }}</td>
            <td style="border: 1px solid #000;">Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" style="border: 1px solid #000; text-align: center;">Tidak ada rincian data transaksi lunas.</td>
        </tr>
    @endforelse
</table>