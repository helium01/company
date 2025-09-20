@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Edit Produk</h1>
    <form action="{{ route('admin.products.update',$product) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama" value="{{ $product->nama }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ $product->harga }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $product->deskripsi }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label>Gambar</label><br>
            @if($product->gambar)
            <img src="{{ asset($product->gambar) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection