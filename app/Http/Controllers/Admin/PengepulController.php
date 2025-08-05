<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengepul;
use App\Models\PengirimanPengepul;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengepulController extends Controller
{
    public function index(Request $request)
{
    $query = Pengepul::query();

    if ($request->filled('name')) {
        $name = $request->name;

        // Jika inputnya hanya angka, anggap sebagai ID (harus exact match)
        if (is_numeric($name)) {
            $query->where('id', $name);
        } else {
            $query->where(function ($q) use ($name) {
                $q->where('nama', 'like', '%' . $name . '%')
                  ->orWhere('alamat', 'like', '%' . $name . '%')
                  ->orWhere('kontak', 'like', '%' . $name . '%');
            });
        }
    }

    $pengepuls = $query->paginate(10)->withQueryString();

    return view('pages.admin.pengepul.index', compact('pengepuls'));
}



    public function create()
    {
        return view('pages.admin.pengepul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
        ]);

        Pengepul::create($request->all());
        return redirect()->route('admin.pengepul.index')->with('success', 'Pengepul berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Ambil data pengepul berdasarkan ID
        $pengepul = Pengepul::findOrFail($id);

        // Ambil riwayat pengiriman ke pengepul
        $riwayatPengiriman = PengirimanPengepul::where('pengepul_id', $id)
            ->with(['detailPengiriman.sampah'])
            ->orderBy('tanggal_pengiriman', 'desc')
            ->get();

        return view('pages.admin.pengepul.show', compact('pengepul', 'riwayatPengiriman'));
    }

    public function edit(string $id)
    {
        $pengepul = Pengepul::findOrFail($id);

        return view('pages.admin.pengepul.edit', compact('pengepul'));
    }

    public function update(Request $request, $id)
    {
        $pengepul = Pengepul::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
        ]);

        $pengepul->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
        ]);

        Alert::success('Berhasil!', 'Pengepul berhasil diperbarui.')->autoclose(3000);
        return redirect()->route('admin.pengepul.index');
    }


    public function destroy($id)
{
    $pengepul = Pengepul::findOrFail($id);
    $pengepul->delete();

    Alert::success('Sukses!', 'Pengepul berhasil dihapus!')->autoclose(3000);
    return redirect()->route('admin.pengepul.index');
}

}
