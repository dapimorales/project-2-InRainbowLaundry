@extends('layouts.app')

@section('content')
<div class="pt-3 pb-2 mb-3 border-bottom d-flex justify-content-between">
    <h1 class="h2">Detail Pelanggan: {{ $customer->nama }}</h1>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-body text-center">
                <div class="mb-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->nama) }}&background=170C79&color=fff" class="rounded-circle" width="100">
                </div>
                <h5>{{ $customer->nama }}</h5>
                <p class="text-muted">{{ $customer->no_hp }}</p>
                <hr>
                <p class="text-start"><strong>Alamat:</strong><br>{{ $customer->alamat }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-header bg-white"><strong>Riwayat Pesanan</strong></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customer->orders as $order)
                        <tr>
                            <td>#{{ $order->kode_invoice }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td><span class="badge bg-success">{{ $order->status_order }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Belum ada riwayat pesanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection