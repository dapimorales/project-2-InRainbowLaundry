@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Layanan</h1>
    <button class="btn btn-primary btn-sm">+ Tambah Layanan</button>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $key => $s)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $s->nama_layanan }}</td>
                    <td>Rp {{ number_format($s->harga) }}</td>
                    <td><span class="badge bg-info text-dark">{{ $s->satuan }}</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data layanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection