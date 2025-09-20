<section id="tentang" class="py-5 bg-white">
    <div class="container my-5">
        <h2 class="text-center mb-4">Daftar Harga - Plastik Packing Polymailer</h2>
        <h5 class="text-center text-muted">Sukses Plastik Nusantara</h5>
        <p class="text-center"><em>Tidak Mudah Sobek & Tahan Air - Minimal pembelian 100 pcs tiap ukuran</em></p>
        <hr>
        @php
        $groupedPrices = $product->prices->groupBy('type');
        @endphp

        <div class="container my-4">
            <h2 class="mb-4">{{ $product->nama_produk }}</h2>

            @if($groupedPrices->isEmpty())
            <div class="alert alert-warning text-center">
                Tidak ada detail produk.
            </div>
            @else
            <div class="row">
                @foreach($groupedPrices as $type => $prices)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Type {{ $type }}</h5>
                        </div>
                        <div class="card-body">
                            @foreach($prices as $price)
                            <div class="mb-3 p-3 border rounded bg-light">
                                <h6 class="fw-bold">{{ $price->ukuran }}</h6>
                                <p class="mb-1">Isi: {{ $price->isi_pcs }} pcs</p>
                                <p class="mb-1">Harga Ikat:
                                    <span class="fw-bold text-success">
                                        Rp {{ number_format($price->harga_ikat, 0, ',', '.') }}
                                    </span>
                                </p>
                                <p class="mb-1">Harga Karung:
                                    <span class="fw-bold text-danger">
                                        Rp {{ number_format($price->harga_karung, 0, ',', '.') }}
                                    </span>
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>



        <p class="mt-3 text-muted"><small>*Harga belum termasuk PPN & ongkir luar pulau ditanggung oleh klien.</small>
        </p>
        <p class="fw-bold">Hubungi: <a href="https://wa.me/6282230478987" target="_blank">082230478987 (Nia)</a></p>
    </div>
</section>