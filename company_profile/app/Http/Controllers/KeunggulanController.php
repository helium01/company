<?php

namespace App\Http\Controllers;

use App\Models\Keunggulan;
use Illuminate\Http\Request;

class KeunggulanController extends Controller
{
    public function index()
    {
        $keunggulans = Keunggulan::all();
        return view('admin.keunggulans.index', compact('keunggulans'));
    }

    public function create()
    {
        return view('admin.keunggulans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Keunggulan::create($request->all());

        return redirect()->route('admin.keunggulans.index')->with('success', 'Keunggulan berhasil ditambahkan.');
    }

    public function show(Keunggulan $keunggulan)
    {
        return view('admin.keunggulans.show', compact('keunggulan'));
    }

    public function edit(Keunggulan $keunggulan)
    {
        return view('admin.keunggulans.edit', compact('keunggulan'));
    }

    public function update(Request $request, Keunggulan $keunggulan)
    {
        $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $keunggulan->update($request->all());

        return redirect()->route('admin.keunggulans.index')->with('success', 'Keunggulan berhasil diperbarui.');
    }

    public function destroy(Keunggulan $keunggulan)
    {
        $keunggulan->delete();
        return redirect()->route('admin.keunggulans.index')->with('success', 'Keunggulan berhasil dihapus.');
    }
}