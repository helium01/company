@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Hero</h1>

    <form action="{{ route('admin.heroes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Sub Judul</label>
            <textarea name="subtitle" class="form-control">{{ old('subtitle') }}</textarea>
            @error('subtitle') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.heroes.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection