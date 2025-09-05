@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kontak</h1>

    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat"
                value="{{ old('alamat', $contact->alamat) }}" placeholder="Masukkan alamat">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $contact->email) }}"
                placeholder="Masukkan email">
        </div>
        <div class="mb-3">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" id="telepon"
                value="{{ old('telepon', $contact->telepon) }}" placeholder="Masukkan nomor telepon">
        </div>
        <div class="mb-3">
            <label for="maps">Google Maps (URL)</label>
            <input type="url" name="maps" class="form-control" id="maps" value="{{ old('maps', $contact->maps) }}"
                placeholder="Masukkan link Google Maps">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection