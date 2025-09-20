@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Tentang Kami</h1>

    <form action="{{ route('admin.abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $about->title) }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description', $about->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Header Visi</label>
            <input type="text" name="visi_header" class="form-control"
                value="{{ old('visi_header', $about->visi_header) }}">
        </div>

        <div class="mb-3">
            <label>Konten Visi</label>
            <textarea name="visi_content"
                class="form-control">{{ old('visi_content', $about->visi_content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Header Misi</label>
            <input type="text" name="misi_header" class="form-control"
                value="{{ old('misi_header', $about->misi_header) }}">
        </div>

        <div class="mb-3">
            <label>Konten Misi</label>
            <textarea name="misi_content"
                class="form-control">{{ old('misi_content', $about->misi_content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control">
            @if($about->image)
            <img src="{{ asset('storage/'.$about->image) }}" alt="" class="img-thumbnail mt-2" width="200">
            @endif
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection