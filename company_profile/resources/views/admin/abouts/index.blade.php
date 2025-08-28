@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Tentang Kami</h1>

    <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50">#</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Gambar</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($abouts as $about)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $about->judul }}</td>
                <td>{{ Str::limit(strip_tags($about->isi), 100) }}</td>
                <td>
                    @if($about->gambar)
                    <img src="{{ asset('storage/' . $about->gambar) }}" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.abouts.show', $about->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Hapus data ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $abouts->links() }}
</div>
@endsection