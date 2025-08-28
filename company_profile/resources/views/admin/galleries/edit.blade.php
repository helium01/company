@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Galeri</h1>

    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $gallery->title }}">
        </div>
        <div class="mb-3">
            <label for="image">Gambar</label><br>
            @if($gallery->image)
            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" width="120" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection