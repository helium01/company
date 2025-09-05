<section id="produk" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="h2 fw-bold mb-3">Produk Kami</h2>
        <hr class="mx-auto mb-5" style="width: 80px; height: 3px; background: #0d6efd" />

        <div class="row g-4 d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card product-card h-100">
                    <img src="{{asset('assets/img/produk.png')}}" max-width: 100px; height: 50px; class="card-img-top"
                        alt="Kantong Plastik" />
                    <div class="card-body">
                        <h5 class="card-title">Kantong Plastik</h5>
                        <p class="card-text text-muted">
                            Berbagai jenis kantong plastik untuk retail dan industri.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">Mulai Rp 15.000/kg</span>
                            <a href="{{ route('catalog') }}" class="btn btn-link text-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <a href="{{ route('catalog') }}" class="btn btn-primary rounded-pill mt-4">Lihat Semua Produk</a>
    </div>
</section>