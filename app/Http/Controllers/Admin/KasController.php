<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KasController extends Controller
{
    // List
    public function index($jenis)
{
    $kas = Kas::where('jenis', $jenis)->latest()->paginate(10);
    return view("pages.admin.kas.$jenis.index", compact('kas', 'jenis'));
}

// Form create
public function create($jenis)
{
    return view("pages.admin.kas.$jenis.create", compact('jenis'));
}


    // Store
    public function store(Request $request, $jenis)
    {
        $request->validate([
            'sumber_dana' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'nominal' => 'required|numeric|min:1',
            'tanggal' => 'required|date',


        ]);

        Kas::create([
            'jenis' => $jenis,
            'sumber_dana' => $request->sumber_dana,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,

        ]);

        Alert::success('Berhasil!', 'Data kas berhasil ditambahkan.');
        return redirect()->route('admin.kas.index', $jenis);
    }

    public function edit($id)
{
    $kas = Kas::findOrFail($id);
    return view("pages.admin.kas.{$kas->jenis}.update", compact('kas'));
}


    // Update
    public function update(Request $request, $id)
    {
        $kas = Kas::findOrFail($id);

        $request->validate([
            'sumber_dana' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'nominal' => 'required|numeric|min:1',
           'tanggal' => 'required|date',


        ]);

        $kas->update($request->only('sumber_dana','keterangan','nominal','tanggal'));

        Alert::success('Berhasil!', 'Data kas berhasil diperbarui.');
        return redirect()->route('admin.kas.index', $kas->jenis);
    }

    // Delete
    public function destroy($id)
    {
        $kas = Kas::findOrFail($id);
        $jenis = $kas->jenis;
        $kas->delete();

        Alert::success('Berhasil!', 'Data kas berhasil dihapus.');
        return redirect()->route('admin.kas.index', $jenis);
    }
}
