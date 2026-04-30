@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Pelanggan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <button class="btn btn-sm btn-outline-secondary me-2">Export</button>
    </div>
</div>

@include('layouts.flash')

<div class="card shadow-sm border-0" style="border-radius: 20px;">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Nomor WhatsApp</th>
                        <th>Alamat</th>
                        <th>Terdaftar Sejak</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $key => $c)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><strong>{{ $c->nama }}</strong></td>
                        <td>
                            <a href="https://wa.me/{{ $c->no_hp }}" target="_blank" class="text-decoration-none">
                                <i class="fab fa-whatsapp text-success me-1"></i> {{ $c->no_hp }}
                            </a>
                        </td>
                        <td>{{ Str::limit($c->alamat, 40) }}</td>
                        <td>{{ $c->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <!-- Tombol Detail -->
                            <a href="{{ route('customers.show', $c->id) }}" class="btn btn-info btn-sm text-white">Detail</a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('customers.destroy', $c->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus pelanggan ini, Masbro?')">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada pelanggan yang melakukan reservasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection