@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Galeri</h1>

    <div class="card">
        <div class="card-body">
            <h4>{{ $gallery->title }}</h4>
            @if($gallery->image)
            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid mt-2">
            @else
            <p><em>Tidak ada gambar</em></p>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection