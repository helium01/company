@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kontak</h1>
    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary mb-3">Tambah Kontak</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Maps</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $contact->alamat }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->telepon }}</td>
                <td>
                    @if($contact->maps)
                    <a href="{{ $contact->maps }}" target="_blank" class="btn btn-sm btn-outline-info">
                        Lihat Maps
                    </a>
                    @else
                    <span class="text-muted">Tidak ada</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
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