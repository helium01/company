@extends('front.layout')
@section('title', 'Produk')
@section('content')
<section class="py-5 bg-light">
    <div class="container text-center">
        @include('front.sections.products')
    </div>
</section>
@endsection