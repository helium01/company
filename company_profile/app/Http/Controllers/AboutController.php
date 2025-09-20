<?php
namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }

    public function index_front()
    {
        $about = About::first();
        return view('front.tentang', compact('about'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'visi_header'  => 'nullable|string|max:255',
            'visi_content' => 'nullable|string',
            'misi_header'  => 'nullable|string|max:255',
            'misi_content' => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/abouts'), $filename);
            $data['image'] = 'uploads/abouts/' . $filename;
        }

        About::create($data);

        return redirect()->route('admin.abouts.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'visi_header'  => 'nullable|string|max:255',
            'visi_content' => 'nullable|string',
            'misi_header'  => 'nullable|string|max:255',
            'misi_content' => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // hapus file lama
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/abouts'), $filename);
            $data['image'] = 'uploads/abouts/' . $filename;
        }

        $about->update($data);

        return redirect()->route('admin.abouts.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(About $about)
    {
        if ($about->image && file_exists(public_path($about->image))) {
            unlink(public_path($about->image));
        }

        $about->delete();
        return redirect()->route('admin.abouts.index')->with('success', 'Data berhasil dihapus');
    }
}