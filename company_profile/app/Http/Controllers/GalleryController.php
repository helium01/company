<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|max:4096',
            'judul' => 'nullable|string',
            'kategori' => 'nullable|string',
        ]);

        $path = $request->file('gambar')->store('galleries', 'public');

        Gallery::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'gambar' => $path
        ]);

        return redirect()->route('admin.galleries.index')->with('success','Gambar berhasil diupload');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'gambar' => 'nullable|image|max:4096',
            'judul' => 'nullable|string',
            'kategori' => 'nullable|string',
        ]);

        $data = $request->only(['judul', 'kategori']);

        if ($request->hasFile('gambar')) {
            if ($gallery->gambar) Storage::disk('public')->delete($gallery->gambar);
            $data['gambar'] = $request->file('gambar')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success','Gambar berhasil diperbarui');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->gambar) Storage::disk('public')->delete($gallery->gambar);
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success','Gambar berhasil dihapus');
    }
}