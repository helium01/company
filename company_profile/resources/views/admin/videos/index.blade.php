@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Produk</h3>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $i => $p)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>
                @if($p->gambar)
                <img src="{{ asset($p->gambar) }}" width="60">
                @endif
            </td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->harga }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.products.destroy', $p) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection