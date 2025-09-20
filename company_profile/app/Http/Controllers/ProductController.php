<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function index_front()
    {
        $products = Product::where('is_active', 1)->get();
    return view('front.produk', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }
    

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'description' => 'nullable|string',
        //     'is_active'   => 'boolean',
        // ]);
        // dd($request);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
    
        // Konversi checkbox ke 1/0
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
    
        Product::create($data);
    
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string',
        'price'       => 'required|numeric|min:0',
        'unit'        => 'required|string|max:50',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif',
        'is_active'   => 'boolean',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('image')) {
        // hapus gambar lama jika ada
        if ($product->image && \Storage::disk('public')->exists($product->image)) {
            \Storage::disk('public')->delete($product->image);
        }
        $validated['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($validated);

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
}

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}