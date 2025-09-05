@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kontak</h1>

    <form action="{{ route('admin.contacts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email">
        </div>
        <div class="mb-3">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Masukkan nomor telepon">
        </div>
        <div class="mb-3">
            <label for="maps">Google Maps (URL)</label>
            <input type="url" name="maps" class="form-control" id="maps" placeholder="Masukkan link Google Maps">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection