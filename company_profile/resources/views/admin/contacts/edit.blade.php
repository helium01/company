@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kontak</h1>

    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $contact->name }}">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $contact->email }}">
        </div>
        <div class="mb-3">
            <label for="phone">Telepon</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ $contact->phone }}">
        </div>
        <div class="mb-3">
            <label for="message">Pesan</label>
            <textarea name="message" class="form-control" id="message" rows="5">{{ $contact->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection