@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit contact</h1>

    <form action="{{ route('admin.contacts.update', $kontak) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $contact->alamat }}">
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $contact->telepon }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
        </div>

        <div class="mb-3">
            <label>Maps (Embed URL)</label>
            <input type="text" name="maps" class="form-control" value="{{ $contact->maps }}">
        </div>

        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="image" class="form-control">
            @if($contact->image)
            <img src="{{ asset($contact->image) }}" alt="Logo" class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection