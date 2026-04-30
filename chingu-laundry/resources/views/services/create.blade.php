@extends('layouts.app')

@section('content')
<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Layanan Baru</h1>
</div>

<div class="card shadow-sm col-md-6">
    <div class="card-body">
        <form action="{{ route('layanan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Layanan</label>
                <input type="text" name="nama_layanan" class="form-control" placeholder="Contoh: Cuci Karpet" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="7000" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Satuan</label>
                <select name="satuan" class="form-select" required>
                    <option value="kg">Kilogram (kg)</option>
                    <option value="pcs">Pcs</option>
                    <option value="m2">Meter Persegi (m2)</option>
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan Layanan</button>
                <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection