<section id="kontak" class="py-5 bg-white">
    <div class="container">
        <h2 class="h2 fw-bold text-center mb-5">Hubungi Kami</h2>
        <div class="row g-4">
            <!-- Informasi Kontak -->
            <div class="col-md-6">
                <h5 class="fw-semibold">Informasi Kontak</h5>


                @if($kontak && $kontak->alamat)
                <p>
                    <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                    {{ $kontak->alamat }}
                </p>
                @endif

                @if($kontak && $kontak->email)
                <p>
                    <i class="bi bi-envelope-fill text-primary me-2"></i>
                    <a href="mailto:{{ $kontak->email }}" class="text-decoration-none text-dark">
                        {{ $kontak->email }}
                    </a>
                </p>
                @endif

                @if($kontak && $kontak->telepon)
                <p>
                    <i class="bi bi-telephone-fill text-primary me-2"></i>
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $kontak->telepon) }}" target="_blank"
                        class="text-decoration-none text-dark">
                        {{ $kontak->telepon }}
                    </a>
                </p>
                @endif

                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                    @if($kontak && $kontak->telepon)
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $kontak->telepon) }}" target="_blank"
                        class="btn btn-success btn-sm">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
                    @endif
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="col-md-6">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button class="btn btn-primary rounded-pill" type="submit">
                        <i class="bi bi-send"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        @if($kontak && $kontak->maps)
        <div class="row mt-5">
            <div class="col-12">
                <iframe src="{{ $kontak->maps }}" width="100%" height="350" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        @endif
    </div>
</section>