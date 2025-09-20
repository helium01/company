@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Harga - {{ $product->name }}</h3>
    <a href="{{ route('admin.product-prices.create', $product->id) }}" class="btn btn-primary mb-3">+ Tambah Harga</a>
    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info mb-3">kembali ke product</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
    // Kelompokkan harga berdasarkan type
    $groupedPrices = $product->prices->groupBy('type');
    @endphp

    @foreach($groupedPrices as $type => $prices)
    <h4 class="mt-4">Type {{ $type }}</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Ukuran</th>
                <th>Isi (pcs)</th>
                <th>Harga Ikat</th>
                <th>Harga Karung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $price)
            <tr>
                <td>{{ $price->type }}</td>
                <td>{{ $price->ukuran }}</td>
                <td>{{ $price->isi_pcs }}</td>
                <td>Rp {{ number_format($price->harga_ikat, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($price->harga_karung, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('admin.product-prices.edit', [$product->id, $price->id]) }}"
                        class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.product-prices.destroy', [$product->id, $price->id]) }}" method="POST"
                        class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')"
                            class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach

</div>
@endsection