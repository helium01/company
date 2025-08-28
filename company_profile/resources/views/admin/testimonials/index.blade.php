@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Testimoni</h1>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary mb-3">Tambah Testimoni</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Isi Testimoni</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonial)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $testimonial->name }}</td>
                <td>{{ Str::limit($testimonial->message, 60) }}</td>
                <td>
                    <a href="{{ route('admin.testimonials.show', $testimonial->id) }}"
                        class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                        class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST"
                        class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus testimoni ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection