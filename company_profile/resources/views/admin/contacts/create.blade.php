@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kontak</h1>

    <form action="{{ route('admin.contacts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="phone">Telepon</label>
            <input type="text" name="phone" class="form-control" id="phone">
        </div>
        <div class="mb-3">
            <label for="message">Pesan</label>
            <textarea name="message" class="form-control" id="message" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection