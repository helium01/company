<section id="tentang" class="py-5 bg-white">
    <div class="container d-flex flex-column flex-md-row align-items-center">
        <!-- Gambar ilustrasi perusahaan -->
        <div class="col-md-6 mb-4">
            @if($about && $about->image)
            <img src="{{ asset('storage/'.$about->image) }}" class="img-fluid rounded shadow"
                alt="{{ $about->title }}" />
            @else
            <img src="{{ asset('assets/img/logotentang.png') }}" class="img-fluid rounded shadow" alt="Tentang Kami" />
            @endif
        </div>

        <!-- Konten tentang perusahaan -->
        <div class="col-md-6 ps-md-5">
            <h2 class="h2 fw-bold mb-3">{{ $about->title ?? 'Tentang Kami' }}</h2>
            <p class="text-muted">
                {!! $about->description ?? 'Belum ada deskripsi' !!}
            </p>

            <!-- Visi -->
            <h4 class="fw-bold">{{ $about->visi_header ?? 'Visi' }}</h4>
            <p class="text-muted">
                {!! $about->visi_content ?? '' !!}
            </p>

            <!-- Misi -->
            <h4 class="fw-bold">{{ $about->misi_header ?? 'Misi' }}</h4>
            @if($about && $about->misi_content)
            <ul class="text-muted">
                @foreach(explode("\n", $about->misi_content) as $misi)
                @if(trim($misi) != '')
                <li><i class="bi bi-check2-circle text-success me-2"></i> {{ $misi }}</li>
                @endif
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</section>