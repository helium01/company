@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kontak</h1>

    <div class="card">
        <div class="card-body">
            <h4>{{ $contact->name }}</h4>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Telepon:</strong> {{ $contact->phone }}</p>
            <p><strong>Pesan:</strong> {{ $contact->message }}</p>
        </div>
    </div>

    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection