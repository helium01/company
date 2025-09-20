<!-- <section class="hero bg-primary text-white py-5">
    <div class="container d-flex align-items-center">
        <div class="col-md-6">
            <h1 class="fw-bold">{{ $hero->title ?? 'No Data' }}</h1>
            <p class="mt-3">{{ $hero->subtitle ?? 'No Data' }}</p>
        </div>
        <div class="col-md-6 text-center">
            @if(!empty($hero->image))
            <img src="{{ asset('storage/' . $hero->image) }}"
                class="img-fluid shadow-lg rounded-4 border border-3 border-primary"
                alt="PT Sukses Plastik Nusantara - Pabrik Plastik"
                style="width: 200%; max-width: 550px; height: 400px; object-fit: cover;">
            @endif
        </div>
    </div>
</section> -->

<section id="home" class="hero text-white d-flex align-items-center py-5" style="
        position: relative;
        background: linear-gradient(to right, #3b82f6, #4f46e5);
        min-height: 100vh;
        overflow: hidden;
    ">

    {{-- Background Image --}}
    @if(!empty($hero->image))
    <div class="hero-bg" style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{ asset( $hero->image) }}') center/cover no-repeat;
            opacity: 0.2; /* Transparansi gambar */
            z-index: 0;
        ">
    </div>
    @endif

    <div class="container text-center position-relative" style="z-index: 1;">
        <h1 class="display-3 fw-bold mb-4">{{ $hero->title ?? 'No Data' }}</h1>
        <p class="lead mb-5 mx-auto" style="max-width: 700px;">
            {{ $hero->subtitle ?? 'No Data' }}
        </p>
        <a href="#about" class="btn btn-lg btn-light fw-semibold px-5 py-3 rounded-pill">
            Explore Our Story
        </a>
    </div>
</section>