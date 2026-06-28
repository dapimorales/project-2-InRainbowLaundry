@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fw-bold text-navy">Data Transaksi</h1>
    
    <div>
        <!--  KASIR OFFLINE -->
        <a href="{{ route('transaksi.create') }}" class="btn text-white fw-bold me-2 btn-sm" style="background-color: #179BAE; border-radius: 5px;">
            <i class="fa-solid fa-plus me-1"></i> Tambah Transaksi Offline
        </a>
    </div>
</div>
<div style="background: #fff; padding: 15px; border-radius: 8px; border: 1px solid #e5e7eb; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
    
    <form action="{{ route('transaksi.index') }}" method="GET" style="display: flex; gap: 10px; align-items: center; margin: 0;">
        <label style="font-weight: bold; color: #374151;">Filter:</label>
        <select name="tipe" style="padding: 8px 12px; border-radius: 5px; border: 1px solid #d1d5db; outline: none; background: #f9fafb;">
            <option value="">Semua Transaksi</option>
            <option value="online" {{ request('tipe') == 'online' ? 'selected' : '' }}>Online (Website)</option>
            <option value="offline" {{ request('tipe') == 'offline' ? 'selected' : '' }}>Offline (Kasir)</option>
        </select>
        
        <button type="submit" style="background: #007bff; color: white; padding: 8px 16px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; transition: 0.3s;">
            Cari
        </button>
    </form>

    <div style="display: flex; gap: 10px;">
        <a href="{{ route('transaksi.pdf', ['tipe' => request('tipe')]) }}" style="background: #dc3545; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: 0.3s;">
            Export PDF
        </a>
        <a href="{{ route('transaksi.excel', ['tipe' => request('tipe')]) }}" style="background: #28a745; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: 0.3s;">
            Export Excel
        </a>
    </div>
    
</div>
@include('layouts.flash')

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Nama Pelanggan</th>
                        <th>Tgl Masuk/Order</th>
                        <th>Estimasi Selesai</th>
                        <th>Jadwal Ambil (User)</th>
                        <th>Status Order</th>
                        <th>Status Bayar</th>
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
                            @if($order->tgl_selesai)
                                <span class="text-danger fw-bold">{{ \Carbon\Carbon::parse($order->tgl_selesai)->format('d M Y') }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        <td>
                            @if($order->rencana_ambil)
                                <span class="badge bg-info text-dark fw-bold">
                                    <i class="fa-solid fa-clock me-1"></i>
                                    {{ \Carbon\Carbon::parse($order->rencana_ambil)->format('d M Y, H:i') }}
                                </span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        
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
                            @if($order->status_bayar == 'lunas')
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-danger">Belum Lunas</span>
                            @endif
                        </td>
                        
                        <td>
                            <a href="{{ route('transaksi.show', $order->id) }}" class="btn btn-info btn-sm text-white mb-1">Detail</a>
                            <a href="{{ route('transaksi.cetak', $order->id) }}" target="_blank" class="btn btn-warning btn-sm text-dark fw-bold mb-1">
                                <i class="fa-solid fa-print"></i> Cetak
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">Belum ada transaksi yang masuk nih, Masbro.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection