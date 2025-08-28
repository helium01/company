@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Testimoni</h1>

    <div class="card">
        <div class="card-body">
            <h4>{{ $testimonial->name }}</h4>
            <p>{{ $testimonial->message }}</p>
        </div>
    </div>

    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection