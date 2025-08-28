<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tipe' => 'required|in:youtube,vimeo,file',
            'url' => 'nullable|string',
            'file' => 'nullable|mimes:mp4,mov,avi|max:20000',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->only(['judul', 'tipe', 'url', 'deskripsi']);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('videos', 'public');
        }

        Video::create($data);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil ditambahkan!');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'judul' => 'required',
            'tipe' => 'required|in:youtube,vimeo,file',
            'url' => 'nullable|string',
            'file' => 'nullable|mimes:mp4,mov,avi|max:20000',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->only(['judul', 'tipe', 'url', 'deskripsi']);

        if ($request->hasFile('file')) {
            if ($video->file) Storage::disk('public')->delete($video->file);
            $data['file'] = $request->file('file')->store('videos', 'public');
        }

        $video->update($data);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil diperbarui!');
    }

    public function destroy(Video $video)
    {
        if ($video->file) Storage::disk('public')->delete($video->file);
        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil dihapus!');
    }
}