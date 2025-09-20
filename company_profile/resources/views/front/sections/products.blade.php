<section id="produk" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="h2 fw-bold mb-3">Produk Kami</h2>
        <hr class="mx-auto mb-5" style="width: 80px; height: 3px; background: #0d6efd" />

        <div class="row g-4 d-flex justify-content-center">
            @forelse($products as $product)
            <div class="col-md-4">
                <div class="card product-card h-100">
                    @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top"
                        style="max-width:100%; height:150px; object-fit:cover;" alt="{{ $product->name }}">
                    @else
                    <img src="{{ asset('assets/img/produk.png') }}" class="card-img-top"
                        style="max-width:100%; height:150px; object-fit:cover;" alt="No Image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">
                            {{ $product->description }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">
                                Mulai Rp {{ number_format($product->price, 0, ',', '.') }}/{{ $product->unit }}
                            </span>
                            <a href="{{ route('catalog.show',$product->id) }}"
                                class="btn btn-link text-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada produk tersedia</p>
            </div>
            @endforelse
        </div>

        <a href="{{ route('catalog') }}" class="btn btn-primary rounded-pill mt-4">Lihat Semua Produk</a>
    </div>
</section>