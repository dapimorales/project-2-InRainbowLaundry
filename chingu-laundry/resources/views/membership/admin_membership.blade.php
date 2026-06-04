@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <h2 class="mb-4">Data Membership</h2>

    <div class="mb-4">
        <a href="{{ route('membership.pdf') }}" class="btn btn-danger text-white me-2">
            <i class="fa-solid fa-file-pdf"></i> Export PDF
        </a>
        <a href="{{ route('membership.excel') }}" class="btn btn-success text-white">
            <i class="fa-solid fa-file-excel"></i> Export Excel
        </a>
    </div> 

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body">
                    <h6 class="fw-bold mb-2">Total Pendapatan Membership</h6>
                    <h3 class="mb-0">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm border-0 text-white" style="background-color: #179BAE;">
                <div class="card-body">
                    <h6 class="fw-bold mb-2">Total Member Aktif</h6>
                    <h3 class="mb-0">{{ $totalMemberAktif }} Orang</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>No. WA</th>
                        <th>Paket</th>
                        <th>Tgl Daftar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($memberships as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-bold">{{ $member->nama_lengkap }}</td>
                        <td>{{ $member->nomor_whatsapp }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ strtoupper($member->paket) }}</span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($member->tgl_mulai)->format('d M Y') }}</td>
                        <td>
                            @if ($member->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif ($member->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @else
                                <span class="badge bg-danger">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-3 text-muted">Belum ada data member.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection