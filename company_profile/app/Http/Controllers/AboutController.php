<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->paginate(10);
        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'isi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('abouts', 'public');
        }

        About::create($data);

        return redirect()->route('admin.abouts.index')->with('success', 'Data Tentang Kami berhasil ditambahkan!');
    }

    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'isi']);

        if ($request->hasFile('gambar')) {
            if ($about->gambar) Storage::disk('public')->delete($about->gambar);
            $data['gambar'] = $request->file('gambar')->store('abouts', 'public');
        }

        $about->update($data);

        return redirect()->route('admin.abouts.index')->with('success', 'Data Tentang Kami berhasil diperbarui!');
    }

    public function destroy(About $about)
    {
        if ($about->gambar) Storage::disk('public')->delete($about->gambar);
        $about->delete();

        return redirect()->route('admin.abouts.index')->with('success', 'Data Tentang Kami berhasil dihapus!');
    }
}