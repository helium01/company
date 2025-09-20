@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Kontak</h1>

    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary mb-3">+ Tambah Kontak</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Maps</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $kontak)
            <tr>
                <td>
                    @if($kontak->image)
                    <img src="{{ asset($kontak->image) }}" width="80" class="img-thumbnail">
                    @else
                    <span class="text-muted">-</span>
                    @endif
                </td>
                <td>{{ $kontak->alamat }}</td>
                <td>{{ $kontak->telepon }}</td>
                <td>{{ $kontak->email }}</td>
                <td><a href="{{ $kontak->maps }}" target="_blank">Lihat Maps</a></td>
                <td>
                    <a href="{{ route('admin.contacts.edit', $kontak) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.contacts.destroy', $kontak) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Hapus kontak ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection