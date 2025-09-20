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
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'unit'        => 'required|string|max:50',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            if (app()->environment('local')) {
                // LOCAL: simpan ke project/public/uploads/products
                $request->file('image')->move(public_path('uploads/products'), $filename);
                $data['image'] = 'uploads/products/' . $filename;
            } else {
                // SERVER: simpan ke public_html/uploads/products
                $serverPath = '/home/sukj4448/public_html/uploads/products';
                if (!file_exists($serverPath)) {
                    mkdir($serverPath, 0775, true);
                }
                $request->file('image')->move($serverPath, $filename);
                $data['image'] = 'uploads/products/' . $filename;
            }
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
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            if (app()->environment('local')) {
                // LOCAL: simpan ke project/public/uploads/products
                $request->file('image')->move(public_path('uploads/products'), $filename);
                $data['image'] = 'uploads/products/' . $filename;
            } else {
                // SERVER: simpan ke public_html/uploads/products
                $serverPath = '/home/sukj4448/public_html/uploads/products';
                if (!file_exists($serverPath)) {
                    mkdir($serverPath, 0775, true);
                }
                $request->file('image')->move($serverPath, $filename);
                $data['image'] = 'uploads/products/' . $filename;
            }
        }

        // Konversi checkbox ke 1/0
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}