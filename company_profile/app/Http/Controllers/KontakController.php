<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        $contacts = Kontak::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'maps' => 'nullable|string',
        ]);

        Kontak::create($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil ditambahkan!');
    }

    public function edit(Kontak $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Kontak $contact)
    {
        $request->validate([
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'maps' => 'nullable|string',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil diperbarui!');
    }

    public function destroy(Kontak $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil dihapus!');
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