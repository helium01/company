<section id="kontak" class="py-5 bg-white">
    <div class="container">
        <h2 class="h2 fw-bold text-center mb-5">Hubungi Kami</h2>
        <div class="row g-4">
            <!-- Informasi Kontak -->
            <div class="col-md-6">
                <h5 class="fw-semibold">Informasi Kontak</h5>
                <p>
                    <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                    Jl. Raya Mojosari, Dusun Ngetrep RT 03 RW 04 Desa Sedati,
                    Kec. Ngoro, Kab. Mojokerto, Jawa Timur 61385
                </p>
                <p>
                    <i class="bi bi-envelope-fill text-primary me-2"></i>
                    <a href="mailto:sales@suksesplastiknusantara.com" class="text-decoration-none text-dark">
                        sales@suksesplastiknusantara.com
                    </a>
                </p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                    <a href="https://wa.me/6282230478987" target="_blank" class="btn btn-success btn-sm">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
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
    </div>
</section>