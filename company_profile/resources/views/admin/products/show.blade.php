@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3>Detail Produk</h3>

    <div class="card mb-3">
        <div class="card-body">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->description }}</p>
            <p><strong>Satuan:</strong> {{ $product->unit }}</p>
            <p><strong>Status:</strong> {{ $product->is_active ? 'Aktif' : 'Tidak Aktif' }}</p>
            @if($product->image)
            <p><img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="200"></p>
            @endif
        </div>
    </div>

    <h5>Daftar Harga</h5>
    <a href="{{ route('admin.product-prices.index', $product->id) }}" class="btn btn-primary mb-2">Kelola Harga</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Ukuran</th>
                <th>Isi (pcs)</th>
                <th>Harga Ikat</th>
                <th>Harga Karung</th>
            </tr>
        </thead>
        <tbody>
            @forelse($product->prices as $price)
            <tr>
                <td>{{ $price->type }}</td>
                <td>{{ $price->ukuran }}</td>
                <td>{{ $price->isi_pcs }}</td>
                <td>Rp {{ number_format($price->harga_ikat, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($price->harga_karung, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data harga</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection