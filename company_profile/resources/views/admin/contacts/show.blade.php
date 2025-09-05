@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kontak</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Alamat:</strong> {{ $contact->alamat }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Telepon:</strong> {{ $contact->telepon }}</p>
            <p><strong>Google Maps:</strong>
                @if($contact->maps)
                <a href="{{ $contact->maps }}" target="_blank">{{ $contact->maps }}</a>
                @else
                <span class="text-muted">Tidak ada</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection