@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Keunggulan</h1>

    <a href="{{ route('admin.keunggulans.create') }}" class="btn btn-primary mb-3">+ Tambah Keunggulan</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($keunggulans as $item)
            <tr>
                <td>
                    @if($item->icon)
                    <i class="{{ $item->icon }} fs-3"></i> {{-- pakai class icon fontawesome/lineicons --}}
                    @else
                    <span class="text-muted">-</span>
                    @endif
                </td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href="{{ route('admin.keunggulans.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.keunggulans.destroy', $item->id) }}" method="POST" class="d-inline">
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