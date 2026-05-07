@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Transaksi</h1>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-navy text-white fw-bold" style="background-color: #170C79;">
                Info Pelanggan
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Nama:</strong> {{ $order->customer->nama ?? '-' }}</p>
                <p class="mb-1"><strong>No WA:</strong> {{ $order->customer->no_hp ?? '-' }}</p>
                <p class="mb-0"><strong>Alamat:</strong> {{ $order->customer->alamat ?? '-' }}</p>
                
                <hr> <form action="{{ route('transaksi.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <label class="fw-bold mb-2">Update Status Cucian:</label>
                    <div class="input-group">
                        <select name="status_order" class="form-select border-primary">
                            <option value="baru" {{ $order->status_order == 'baru' ? 'selected' : '' }}>Baru (Antre)</option>
                            <option value="proses" {{ $order->status_order == 'proses' ? 'selected' : '' }}>Sedang Diproses</option>
                            <option value="selesai" {{ $order->status_order == 'selesai' ? 'selected' : '' }}>Selesai (Siap Diambil)</option>
                            <option value="diambil" {{ $order->status_order == 'diambil' ? 'selected' : '' }}>Sudah Diambil</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-light fw-bold d-flex justify-content-between">
                <span>Invoice: {{ $order->kode_invoice }}</span>
                <span>Status: 
                    @if($order->status_order == 'baru')
                        <span class="badge bg-primary">BARU</span>
                    @elseif($order->status_order == 'proses')
                        <span class="badge bg-warning text-dark">DIPROSES</span>
                    @elseif($order->status_order == 'selesai')
                        <span class="badge bg-success">SELESAI</span>
                    @elseif($order->status_order == 'diambil')
                        <span class="badge bg-info text-dark">DIAMBIL</span>
                    @endif
                </span>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Layanan</th>
                            <th>Harga Satuan</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $detail)
                        <tr>
                            <td>{{ $detail->service->nama_layanan ?? 'Layanan Dihapus' }}</td>
                            <td>Rp {{ number_format($detail->service->harga ?? 0) }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>Rp {{ number_format($detail->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total Harga:</th>
                            <th class="text-danger fs-5">Rp {{ number_format($order->total_harga) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection