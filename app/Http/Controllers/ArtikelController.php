<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        $artikels = Artikel::latest()->take(5)->get(); // buat rekomendasi/berita lain

        return view('artikel.show', compact('artikel', 'artikels'));
    }

    
}
