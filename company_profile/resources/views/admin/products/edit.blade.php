@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-3">
            <label>Satuan</label>
            <input type="text" name="unit" class="form-control" value="{{ old('unit', $product->unit) }}" required>
        </div>

        <div class="mb-3">
            <label>Gambar Produk</label>
            <input type="file" name="image" class="form-control">
            @if($product->image)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$product->image) }}" alt="Gambar Produk" class="img-thumbnail"
                    width="150">
            </div>
            @endif
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" class="form-check-input"
                {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
            <label class="form-check-label">Aktif</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection