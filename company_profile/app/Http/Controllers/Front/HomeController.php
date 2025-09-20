<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Keunggulan;
use App\Models\About;
use App\Models\Kontak;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 1 hero terakhir atau bisa semua
        $hero = Hero::latest()->first();
        $keunggulans = Keunggulan::all(); // ambil semua
        $about = About::first();
        $kontak = Kontak::first();
        $products = Product::where('is_active', 1)->get();

        // Kalau mau banyak hero:
        // $heroes = Hero::all();

        return view('front.home', compact('hero','keunggulans','about','kontak','products'));
    }
    public function show($id)
    {
        // Ambil produk beserta prices (relasi hasMany)
        $product = Product::with('prices')->findOrFail($id);

        return view('front.catalog', compact('product'));
    }
}