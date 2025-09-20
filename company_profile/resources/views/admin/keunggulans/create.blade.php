@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Keunggulan</h1>

    <form action="{{ route('admin.keunggulans.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="icon" class="form-label">Icon (class CSS / FontAwesome)</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon') }}"
                placeholder="Contoh: fa fa-box">
            @error('icon') <small class="text-danger">{{ $message }}</small> @enderror
            <div class="form-text">Gunakan class icon FontAwesome/Bootstrap (opsional).</div>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.keunggulans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection