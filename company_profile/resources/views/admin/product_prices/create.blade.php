@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Harga - {{ $product->name }}</h3>

    <form action="{{ route('admin.product-prices.store', $product->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Ukuran</label>
            <input type="text" name="ukuran" class="form-control" value="{{ old('ukuran') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi (pcs)</label>
            <input type="number" name="isi_pcs" class="form-control" value="{{ old('isi_pcs') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Ikat</label>
            <input type="number" name="harga_ikat" class="form-control" value="{{ old('harga_ikat') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Karung</label>
            <input type="number" name="harga_karung" class="form-control" value="{{ old('harga_karung') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.product-prices.index', $product->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection