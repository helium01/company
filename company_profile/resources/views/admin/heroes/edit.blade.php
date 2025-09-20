@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Hero</h1>

    <form action="{{ route('admin.heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $hero->title) }}" required>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Sub Judul</label>
            <textarea name="subtitle" class="form-control">{{ old('subtitle', $hero->subtitle) }}</textarea>
            @error('subtitle') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label><br>
            @if($hero->image)
            <img src="{{ asset('storage/' . $hero->image) }}" width="150" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.heroes.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection