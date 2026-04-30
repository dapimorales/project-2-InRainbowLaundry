@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Layanan</h1>
   <a href="{{ route('layanan.create') }}" class="btn btn-primary btn-sm">+ Tambah Layanan</a>
</div>
@include('layouts.flash')



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
                        <!-- Tombol Edit -->
                        <a href="{{ route('layanan.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('layanan.destroy', $s->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus, masbro?')">Remove</button>
                        </form>
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