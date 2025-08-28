@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Tentang Kami</h1>

    <form action="{{ route('admin.abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $about->judul) }}" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required>{{ old('isi', $about->isi) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label><br>
            @if($about->gambar)
            <img src="{{ asset('storage/' . $about->gambar) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection