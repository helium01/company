@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Galeri</h1>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary mb-3">Tambah Galeri</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galleries as $gallery)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gallery->title }}</td>
                <td>
                    @if($gallery->image)
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.galleries.show', $gallery->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection