<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sampah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Services\PermissionService;

class SampahController extends Controller
{
    public function index()
    {
        $sampahs = Sampah::paginate(10);
        return view('pages.admin.sampah.index', compact('sampahs'));
    }

    public function create()
    {
        return view('pages.admin.sampah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sampah'   => 'required|string|max:255',
            'harga_per_kg'  => 'required|numeric',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $payload = $request->only('nama_sampah', 'harga_per_kg');

        if ($request->hasFile('gambar')) {
            $fileName = Str::random(40) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->storeAs('public/sampah', $fileName);
            $payload['gambar'] = $fileName;
        }

        $ok = PermissionService::requestOrExecute(
            'create',
            'sampah',
            null,
            $payload,
            fn() => Sampah::create($payload)
        );

        if (!$ok) {
            Alert::info('Menunggu Persetujuan', 'Penambahan sampah menunggu persetujuan petugas.');
            return back();
        }

        Alert::success('Hore!', 'Data sampah berhasil ditambahkan!')->autoclose(3000);
        return redirect()->route('admin.sampah.index');
    }

    public function edit(string $id)
    {
        $sampah = Sampah::findOrFail($id);
        return view('pages.admin.sampah.edit', compact('sampah'));
    }

    public function update(Request $request, string $id)
    {
        $sampah = Sampah::findOrFail($id);

        $request->validate([
            'nama_sampah'   => 'required|string|max:255',
            'harga_per_kg'  => 'required|numeric',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $payload = $request->only('nama_sampah', 'harga_per_kg');

        if ($request->hasFile('gambar')) {
            if ($sampah->gambar) {
                Storage::delete('public/sampah/' . $sampah->gambar);
            }
            $fileName = Str::random(40) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->storeAs('public/sampah', $fileName);
            $payload['gambar'] = $fileName;
        }

        $ok = PermissionService::requestOrExecute(
            'update',
            'sampah',
            $sampah->id,
            $payload,
            fn() => $sampah->update($payload)
        );

        if (!$ok) {
            Alert::info('Menunggu Persetujuan', 'Update data sampah menunggu persetujuan petugas.');
            return back();
        }

        Alert::success('Berhasil!', 'Data sampah berhasil diperbarui.')->autoclose(3000);
        return redirect()->route('admin.sampah.index');
    }

    public function destroy($id)
    {
        $sampah = Sampah::findOrFail($id);

        $ok = PermissionService::requestOrExecute(
            'delete',
            'sampah',
            $sampah->id,
            null,
            function () use ($sampah) {
                if ($sampah->gambar) {
                    Storage::delete('public/sampah/' . $sampah->gambar);
                }
                $sampah->delete();
            }
        );

        if (!$ok) {
            Alert::info('Menunggu Persetujuan', 'Penghapusan sampah menunggu persetujuan petugas.');
            return back();
        }

        Alert::success('Sukses!', 'Sampah berhasil dihapus!')->autoclose(3000);
        return redirect()->route('admin.sampah.index');
    }
}
