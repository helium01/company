@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Tentang Kami</h1>

    <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required>{{ old('isi') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection