<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;
use App\Models\Nasabah;
use App\Models\Artikel;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // Artikel terbaru, tampilkan 3
        $artikels = Artikel::latest()->paginate(3);

        // Sampah terbaru, tampilkan 5
        $sampahs = Sampah::latest()->paginate(5);

        // Nasabah dengan pencarian + saldo, tampilkan 5
        $nasabahs = Nasabah::with('saldo')
            ->when($request->search, function ($q) use ($request) {
                $s = $request->search;
                $q->where('nama_lengkap', 'like', "%$s%")
                  ->orWhere('no_registrasi', 'like', "%$s%")
                  ->orWhere('no_hp', 'like', "%$s%");
            })
            ->latest()
            ->paginate(5);

        return view('welcome', compact('artikels', 'sampahs', 'nasabahs'));
    }
}
