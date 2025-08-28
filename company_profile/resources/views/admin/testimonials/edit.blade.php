@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Testimoni</h1>

    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $testimonial->name }}">
        </div>
        <div class="mb-3">
            <label for="message">Isi Testimoni</label>
            <textarea name="message" class="form-control" id="message" rows="5">{{ $testimonial->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection