<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    // Tampilkan daftar harga berdasarkan produk
    public function index($productId)
    {
        $product = Product::with('prices')->findOrFail($productId);
        return view('admin.product_prices.index', compact('product'));
    }

    // Form tambah harga
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('admin.product_prices.create', compact('product'));
    }

    // Simpan harga baru
    public function store(Request $request, $productId)
    {
        $request->validate([
            'type' => 'nullable|string|max:50',
            'ukuran' => 'required|string|max:50',
            'isi_pcs' => 'required|integer',
            'harga_ikat' => 'required|numeric',
            'harga_karung' => 'required|numeric',
        ]);

        $product = Product::findOrFail($productId);
        $product->prices()->create($request->all());

        return redirect()->route('admin.product-prices.index', $productId)
                         ->with('success', 'Data harga berhasil ditambahkan');
    }

    // Form edit harga
    public function edit($productId, $id)
    {
        $product = Product::findOrFail($productId);
        $price = ProductPrice::findOrFail($id);
        return view('admin.product_prices.edit', compact('product', 'price'));
    }

    // Update harga
    public function update(Request $request, $productId, $id)
    {
        $request->validate([
            'type' => 'nullable|string|max:50',
            'ukuran' => 'required|string|max:50',
            'isi_pcs' => 'required|integer',
            'harga_ikat' => 'required|numeric',
            'harga_karung' => 'required|numeric',
        ]);

        $price = ProductPrice::findOrFail($id);
        $price->update($request->all());

        return redirect()->route('admin.product-prices.index', $productId)
                         ->with('success', 'Data harga berhasil diperbarui');
    }

    // Hapus harga
    public function destroy($productId, $id)
    {
        $price = ProductPrice::findOrFail($id);
        $price->delete();

        return redirect()->route('admin.product-prices.index', $productId)
                         ->with('success', 'Data harga berhasil dihapus');
    }
}