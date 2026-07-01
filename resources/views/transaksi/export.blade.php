<table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
    <thead>
        <tr>
            <th style="padding: 8px;">No Invoice</th>
            <th style="padding: 8px;">Nama Pelanggan</th> <th style="padding: 8px;">Tgl Masuk</th>
            <th style="padding: 8px;">Total Harga</th>
            <th style="padding: 8px;">Status Order</th>
            <th style="padding: 8px;">Status Bayar</th>
            <th style="padding: 8px;">Tipe Pesanan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $item)
        <tr>
            <td style="padding: 8px;">{{ $item->kode_invoice }}</td>
            
            <td style="padding: 8px;">{{ $item->customer ? $item->customer->nama : 'Pelanggan Dihapus' }}</td> 
            
            <td style="padding: 8px;">{{ $item->tgl_masuk }}</td>
            <td style="padding: 8px;">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
            <td style="padding: 8px;">{{ ucfirst($item->status_order) }}</td>
            <td style="padding: 8px;">{{ ucfirst($item->status_bayar) }}</td>
            <td style="padding: 8px;">{{ ucfirst($item->tipe_pesanan) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>