<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    // untuk frontend

    // untuk backend
    public function index()
    {
        $heroes = Hero::all();
        return view('admin.heroes.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.heroes.create');
    }

    public function store(Request $request)
    {
        // dd("sampe sini");
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('heroes', 'public');
        }

        Hero::create($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero berhasil ditambahkan.');
    }

    public function show(Hero $hero)
    {
        return view('admin.heroes.show', compact('hero'));
    }

    public function edit(Hero $hero)
    {
        return view('admin.heroes.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($hero->image && file_exists(storage_path('app/public/' . $hero->image))) {
                unlink(storage_path('app/public/' . $hero->image));
            }
            $data['image'] = $request->file('image')->store('heroes', 'public');
        }

        $hero->update($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero berhasil diperbarui.');
    }

    public function destroy(Hero $hero)
    {
        if ($hero->image && file_exists(storage_path('app/public/' . $hero->image))) {
            unlink(storage_path('app/public/' . $hero->image));
        }

        $hero->delete();

        return redirect()->route('admin.heroes.index')->with('success', 'Hero berhasil dihapus.');
    }
}