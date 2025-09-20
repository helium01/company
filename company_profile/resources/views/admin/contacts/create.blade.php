@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Kontak</h1>

    <form action="{{ route('admin.contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Maps (Embed URL)</label>
            <input type="text" name="maps" class="form-control">
        </div>

        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection