@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Tentang Kami</h1>

    <div class="card">
        <div class="card-body">
            <h3>{{ $about->judul }}</h3>
            <p>{!! nl2br(e($about->isi)) !!}</p>

            @if($about->gambar)
            <div class="mt-3">
                <img src="{{ asset('storage/' . $about->gambar) }}" class="img-fluid rounded" style="max-width: 400px;">
            </div>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection