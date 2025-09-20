<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class KontakController extends Controller
{
    public function index()
    {
        $contacts = Kontak::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function index_front()
    {
        $kontak = Kontak::first();
        return view('front.kontak', compact('kontak'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'alamat'  => 'nullable|string',
            'telepon' => 'nullable|string',
            'email'   => 'nullable|email',
            'maps'    => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/kontaks'), $filename);
            $data['image'] = 'uploads/kontaks/' . $filename;
        }

        Kontak::create($data);

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit(Kontak $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Kontak $contact)
    {
        $data = $request->validate([
            'alamat'  => 'nullable|string',
            'telepon' => 'nullable|string',
            'email'   => 'nullable|email',
            'maps'    => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($contact->image && file_exists(public_path($contact->image))) {
                unlink(public_path($contact->image));
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/kontaks'), $filename);
            $data['image'] = 'uploads/kontaks/' . $filename;
        }

        $contact->update($data);

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy(Kontak $contact)
    {
        if ($contact->image && file_exists(public_path($contact->image))) {
            unlink(public_path($contact->image));
        }

        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil dihapus.');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'body'  => 'required|string',
        ]);

        Mail::to('sales@suksesplastiknusantara.com')->send(new ContactMail($data));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}