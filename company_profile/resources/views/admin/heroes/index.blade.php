@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Hero Section</h1>

    <a href="{{ route('admin.heroes.create') }}" class="btn btn-primary mb-3">+ Tambah Hero</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Sub Judul</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($heroes as $hero)
            <tr>
                <td>{{ $hero->title }}</td>
                <td>{{ $hero->subtitle }}</td>
                <td>
                    @if($hero->image)
                    <img src="{{ asset($hero->image) }}" width="120" alt="Hero Image">
                    @else
                    <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.heroes.edit', $hero->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.heroes.destroy', $hero->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin mau hapus?')"
                            class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection