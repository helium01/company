@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Tentang Kami</h1>
    <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary mb-3">Tambah Baru</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Visi</th>
                <th>Misi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($abouts as $about)
            <tr>
                <td>{{ $about->title }}</td>
                <td>{{ Str::limit($about->visi_content, 50) }}</td>
                <td>{{ Str::limit($about->misi_content, 50) }}</td>
                <td>
                    @if($about->image)
                    <img src="{{ asset($about->image) }}" alt="" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST"
                        style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection