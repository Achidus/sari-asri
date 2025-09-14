<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kas;
use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\PermissionService;


class KasController extends Controller
{
    // List
    public function index($jenis)
{
    $kas = Kas::where('jenis', $jenis)->latest()->paginate(10);

    // ambil permission pending oleh admin yang login, per record id
    $pending = Permission::where('admin_id', auth()->id())
                ->where('table_name', 'kas')
                ->where('status', 'pending')
                ->get()
                ->keyBy('record_id'); // keyBy record_id agar mudah dicari di view

    return view("pages.admin.kas.$jenis.index", compact('kas', 'jenis', 'pending'));
}


    // Form create
    public function create($jenis)
    {
        return view("pages.admin.kas.$jenis.create", compact('jenis'));
    }

    // Store langsung (tidak perlu izin)
    public function store(Request $request, $jenis)
    {
        $request->validate([
            'sumber_dana' => 'required|string|max:255',
            'keterangan'  => 'nullable|string',
            'nominal'     => 'required|numeric|min:1',
            'tanggal'     => 'required|date',
        ]);

        Kas::create([
            'jenis'       => $jenis,
            'sumber_dana' => $request->sumber_dana,
            'keterangan'  => $request->keterangan,
            'nominal'     => $request->nominal,
            'tanggal'     => $request->tanggal,
        ]);

        Alert::success('Berhasil!', 'Data kas berhasil ditambahkan.');
        return redirect()->route('admin.kas.index', $jenis);
    }

    public function edit($id)
    {
        $kas = Kas::findOrFail($id);
        return view("pages.admin.kas.{$kas->jenis}.update", compact('kas'));
    }

    // Update (cek izin)
   public function update(Request $request, $id)
{
    $kas = Kas::findOrFail($id);

    $payload = $request->only('sumber_dana','keterangan','nominal','tanggal');

    $ok = PermissionService::requestOrExecute(
        'update',
        'kas',
        $kas->id,
        $payload,
        fn() => $kas->update($payload) // callback kalau langsung dieksekusi
    );

    if (!$ok) {
        Alert::info('Menunggu Persetujuan', 'Update kas menunggu persetujuan petugas.');
        return back();
    }

    Alert::success('Berhasil!', 'Data kas berhasil diperbarui.');
    return redirect()->route('admin.kas.index', $kas->jenis);
}


   // Delete (cek izin)
public function destroy($id)
{
    $kas = Kas::findOrFail($id);
    $jenis = $kas->jenis;

    $ok = PermissionService::requestOrExecute(
        'delete',
        'kas',
        $kas->id,
        null,
        fn() => $kas->delete()
    );

    if (!$ok) {
        Alert::info('Menunggu Persetujuan', 'Penghapusan kas menunggu persetujuan petugas.');
        return back();
    }

    Alert::success('Berhasil!', 'Data kas berhasil dihapus.');
    return redirect()->route('admin.kas.index', $jenis);
}


}
