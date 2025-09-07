<?php

namespace App\Http\Controllers\petugas;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert; 

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::paginate(10);
        return view('pages.petugas.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('pages.petugas.petugas.create');
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas',
            'username' => 'required|string|unique:petugas',
            'password' => 'required|string|min:6',
            'role' => 'required|in:petugas,petugas'
        ]);

        Petugas::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Alert::success('Sukses!', 'Petugas berhasil ditambahkan!')->autoclose(3000);
        return redirect()->route('petugas.petugas.index');

    } catch (\Illuminate\Validation\ValidationException $e) {
        Alert::error('Gagal!', 'Email atau Username sudah digunakan!')->autoclose(3000);
        return redirect()->back()->withInput();
    }
}

    // public function show(Petugas $petugas)
    // {
    //     return view('petugas.petugas.show', compact('petugas'));
    // }

    public function edit(string $id)
    {
        $petugas = Petugas::findOrFail($id);

        return view('pages.Petugas.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
{
    $petugas = Petugas::findOrFail($id);

    try {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email,' . $petugas->id,
            'username' => 'required|string|unique:petugas,username,' . $petugas->id,
            'role' => 'required|in:petugas,petugas'
        ]);

        $petugas->update($request->only(['nama', 'email', 'username', 'role']));

        Alert::success('Sukses!', 'Petugas berhasil diperbarui!')->autoclose(3000);
        return redirect()->route('petugas.petugas.index');

    } catch (\Illuminate\Validation\ValidationException $e) {
        Alert::error('Gagal!', 'Email atau Username sudah digunakan!')->autoclose(3000);
        return redirect()->back()->withInput();
    }
}


    public function destroy($id)
{
    $petugas = Petugas::findOrFail($id);
    $petugas->delete();

    Alert::success('Sukses!', 'Petugas berhasil dihapus!')->autoclose(3000);
    return redirect()->route('petugas.petugas.index');
}

    
}
