@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Laporan Pendapatan Bulanan</h4>
            <div>
                <a href="{{ route('transaksi.pendapatan.pdf', ['bulan' => request('bulan')]) }}" class="btn btn-danger btn-sm">Export PDF</a>
                <a href="{{ route('transaksi.pendapatan.excel', ['bulan' => request('bulan')]) }}" class="btn btn-success btn-sm">Export Excel</a>
            </div>
        </div>
        <div class="card-body">
            
            <!-- FORM FILTER PENCARIAN BY BULAN -->
            <form action="{{ route('transaksi.pendapatan') }}" method="GET" class="mb-4">
                <div class="row align-items-end">
                    <div class="col-md-3">
                        <label for="bulan" class="form-label">Pilih Bulan & Tahun:</label>
                        <!-- type="month" otomatis bikin dropdown bulan yang rapi -->
                        <input type="month" name="bulan" id="bulan" class="form-control" value="{{ request('bulan') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                    <div class="col-md-2">
                        <!-- Tombol reset buat ngehapus filter dan nampilin semua data lagi -->
                        <a href="{{ route('transaksi.pendapatan') }}" class="btn btn-secondary w-100">Reset</a>
                    </div>
                </div>
            </form>
            <hr>
            <!-- END FORM FILTER -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>Bulan & Tahun</th>
                            <th>Total Order / Transaksi</th>
                            <th>Total Pendapatan (Lunas)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->bulan_format }}</td>
                                <td>{{ $data->total_transaksi }} Order</td>
                                <td>Rp {{ number_format($data->total_pendapatan, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data laporan tidak ditemukan untuk bulan tersebut.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection