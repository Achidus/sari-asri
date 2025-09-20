<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;

class NasabahController extends Controller
{
    public function index(Request $request)
    {
        $nasabahs = Nasabah::with('saldo')
            ->when($request->search, function ($q) use ($request) {
                $s = $request->search;
                $q->where('nama_lengkap', 'like', "%$s%")
                  ->orWhere('no_registrasi', 'like', "%$s%")
                  ->orWhere('no_hp', 'like', "%$s%");
            })
            ->latest()
            ->paginate(10);

        return view('nasabah.index', compact('nasabahs'));
    }
}
