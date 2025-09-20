<!-- <section class="py-5 bg-white">
    <div class="container text-center">
        <h2 class="h2 fw-bold mb-3">Keunggulan Produk Kami</h2>
        <hr class="mx-auto mb-5" style="width: 80px; height: 3px; background: #0d6efd" />
        <div class="row g-4">
            <div class="col-md-4">
                <i class="fas fa-box-open text-primary fa-3x mb-3"></i>
                <h5 class="fw-semibold">Produk Inovatif</h5>
                <p class="text-muted">
                    Menyediakan <strong>Polymailer</strong> dan <strong>Trash Bag</strong> dengan desain modern sesuai
                    kebutuhan industri.
                </p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-check-circle text-primary fa-3x mb-3"></i>
                <h5 class="fw-semibold">Kualitas Premium</h5>
                <p class="text-muted">
                    Diproduksi dengan bahan pilihan dan <em>quality control</em> ketat untuk menjamin mutu terbaik.
                </p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-people-carry text-primary fa-3x mb-3"></i>
                <h5 class="fw-semibold">Layanan Terpercaya</h5>
                <p class="text-muted">
                    Tim profesional siap memberikan pelayanan terbaik dan pengiriman tepat waktu ke seluruh Indonesia.
                </p>
            </div>
        </div>
    </div>
</section> -->
<style>
.d-flex.overflow-auto {
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 10px;
}

.d-flex.overflow-auto>div {
    scroll-snap-align: start;
}
</style>
<section class="py-5 bg-white">
    <div class="container text-center">
        <h2 class="h2 fw-bold mb-3">Keunggulan Produk Kami</h2>
        <hr class="mx-auto mb-5" style="width: 80px; height: 3px; background: #0d6efd" />

        {{-- Wrapper scroll horizontal --}}
        <div class="d-flex overflow-auto" style="gap: 1.5rem;">
            @foreach ($keunggulans as $keunggulan)
            <div class="col-md-4 flex-shrink-0" style="min-width: 300px;">
                <i class="{{ $keunggulan->icon }} fa-3x mb-3"></i>
                <h5 class="fw-semibold">{{ $keunggulan->title }}</h5>
                <p class="text-muted">{!! $keunggulan->description !!}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>