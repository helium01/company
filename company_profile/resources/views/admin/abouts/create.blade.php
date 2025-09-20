@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Tentang Kami</h1>

    <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Header Visi</label>
            <input type="text" name="visi_header" class="form-control" value="{{ old('visi_header', 'Visi') }}">
        </div>

        <div class="mb-3">
            <label>Konten Visi</label>
            <textarea name="visi_content" class="form-control">{{ old('visi_content') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Header Misi</label>
            <input type="text" name="misi_header" class="form-control" value="{{ old('misi_header', 'Misi') }}">
        </div>

        <div class="mb-3">
            <label>Konten Misi</label>
            <textarea name="misi_content" class="form-control">{{ old('misi_content') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection