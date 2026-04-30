@extends('layouts.app')

@section('content')
<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Layanan</h1>
</div>

<div class="card shadow-sm col-md-6">
    <div class="card-body">
        <form action="{{ route('layanan.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Wajib buat update di Laravel -->
            
            <div class="mb-3">
                <label>Nama Layanan</label>
                <input type="text" name="nama_layanan" class="form-control" value="{{ $service->nama_layanan }}" required>
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $service->harga }}" required>
            </div>
            <div class="mb-3">
                <label>Satuan</label>
                <select name="satuan" class="form-select">
                    <option value="kg" {{ $service->satuan == 'kg' ? 'selected' : '' }}>kg</option>
                    <option value="pcs" {{ $service->satuan == 'pcs' ? 'selected' : '' }}>pcs</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Update Data</button>
            <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection