@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Transaksi</h1>
    <button class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-download"></i> Export Data</button>
</div>

@include('layouts.flash')

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Nama Pelanggan</th>
                        <th>Tgl Jemput</th>
                        <th>Status Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $key => $order)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><span class="badge bg-secondary">{{ $order->kode_invoice }}</span></td>
                        
                        <td class="fw-bold">{{ $order->customer->nama ?? 'Data Terhapus' }}</td>
                        
                        <td>{{ \Carbon\Carbon::parse($order->tgl_masuk)->format('d M Y, H:i') }}</td>
                        
                        <td>
                            @if($order->status_order == 'baru')
                                <span class="badge bg-primary">Baru</span>
                            @elseif($order->status_order == 'proses')
                                <span class="badge bg-warning text-dark">Diproses</span>
                            @elseif($order->status_order == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @elseif($order->status_order == 'diambil')
                                <span class="badge bg-info text-dark">Diambil</span>
                            @else
                                <span class="badge bg-secondary">{{ $order->status_order }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('transaksi.show', $order->id) }}" class="btn btn-info btn-sm text-white">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada transaksi yang masuk nih, Masbro.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection