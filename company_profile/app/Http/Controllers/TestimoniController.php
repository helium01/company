<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::latest()->paginate(10);
        return view('admin.testimoni.index', compact('testimoni'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'nullable|string',
            'pesan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nama', 'jabatan', 'pesan']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('testimoni', 'public');
        }

        Testimoni::create($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function edit(Testimoni $testimoni)
    {
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'nullable|string',
            'pesan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nama', 'jabatan', 'pesan']);

        if ($request->hasFile('foto')) {
            if ($testimoni->foto) Storage::disk('public')->delete($testimoni->foto);
            $data['foto'] = $request->file('foto')->store('testimoni', 'public');
        }

        $testimoni->update($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy(Testimoni $testimoni)
    {
        if ($testimoni->foto) Storage::disk('public')->delete($testimoni->foto);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus!');
    }
}