<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PT Sukses Plastik Nusantara | Solusi Plastik Berkualitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
    .gradient-bg {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .testimonial-card:hover {
        background-color: #f8fafc;
    }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">PT. Sukses Plastik Nusantara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('home') ? 'active text-primary' : '' }}"
                            href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('produk') ? 'active text-primary' : '' }}"
                            href="{{ route('produk') }}">Produk</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('tentang') ? 'active text-primary' : '' }}"
                            href="{{ route('tentang') }}">Tentang Kami</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('kontak') ? 'active text-primary' : '' }}"
                            href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')



    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>© 2023 PT Sukses Plastik Nusantara. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>