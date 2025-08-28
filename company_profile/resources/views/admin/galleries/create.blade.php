@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Galeri</h1>

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="image">Gambar</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection