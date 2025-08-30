<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PencairanSaldo;
use App\Models\Nasabah;

class PencairanSaldoController extends Controller
{
    public function index(Request $request)
{
    $query = PencairanSaldo::with('nasabah');

    if ($request->filled('search')) {
        $search = $request->search;
        $query->whereHas('nasabah', function($q) use ($search) {
            $q->where('nama_lengkap', 'like', "%{$search}%")
              ->orWhere('no_registrasi', 'like', "%{$search}%");
        });
    }

    $pencairan = $query->latest()->paginate(10);

    return view('pages.admin.pencairan_saldo.index', compact('pencairan'));
}


    public function create()
    {
        $nasabah = Nasabah::all();
        return view('pages.admin.pencairan_saldo.create', compact('nasabah'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nasabah_id' => 'required|exists:nasabah,id',
        'jumlah_pencairan' => 'required|numeric|min:1000',
        'metode_pencairan' => 'required|string',
        'status' => 'required|in:pending,disetujui,ditolak',
    ]);

    $nasabah = Nasabah::with('saldo')->findOrFail($request->nasabah_id);
    $saldo = $nasabah->saldo;

    // ✅ Cek saldo cukup hanya kalau status disetujui
    if ($request->status === 'disetujui') {
        if (!$saldo || $saldo->saldo < $request->jumlah_pencairan) {
            return back()->withInput()->with('error', 'Saldo nasabah tidak mencukupi untuk pencairan!');
        }
    }

    // Simpan pencairan saldo
    $pencairan = PencairanSaldo::create([
        'nasabah_id' => $request->nasabah_id,
        'jumlah_pencairan' => $request->jumlah_pencairan,
        'metode_pencairan' => $request->metode_pencairan,
        'nomor_rekening' => $request->nomor_rekening,
        'status' => $request->status,
    ]);

    // ✅ Update saldo kalau disetujui
    if ($request->status === 'disetujui') {
        $saldo->saldo -= $request->jumlah_pencairan;
        $saldo->save();
    }

    return redirect()->route('admin.pencairan_saldo.index')
        ->with('success', 'Pencairan saldo berhasil ditambahkan.');
}



    public function edit($id)
    {
        $pencairan = PencairanSaldo::findOrFail($id);
        $nasabah = Nasabah::all();
        return view('pages.admin.pencairan_saldo.edit', compact('pencairan', 'nasabah'));
    }

    public function update(Request $request, $id)
{
    $pencairan = PencairanSaldo::findOrFail($id);
    $nasabah   = Nasabah::with('saldo')->findOrFail($pencairan->nasabah_id);

    $oldStatus = $pencairan->status;
    $newStatus = $request->status;

    // kalau status lama disetujui → lalu diganti pending/ditolak → saldo dikembalikan
    if ($oldStatus === 'disetujui' && in_array($newStatus, ['pending', 'ditolak'])) {
        $nasabah->saldo->saldo += $pencairan->jumlah_pencairan;
        $nasabah->saldo->save();
    }

    // kalau status lama bukan disetujui → lalu diganti jadi disetujui → saldo dikurangi
    if ($oldStatus !== 'disetujui' && $newStatus === 'disetujui') {
        if ($nasabah->saldo->saldo < $request->jumlah_pencairan) {
            return back()->withErrors(['saldo' => 'Saldo nasabah tidak mencukupi.']);
        }

        $nasabah->saldo->saldo -= $request->jumlah_pencairan;
        $nasabah->saldo->save();
    }

    // update data pencairan
    $pencairan->update([
        'nasabah_id'       => $request->nasabah_id,
        'jumlah_pencairan' => $request->jumlah_pencairan,
        'metode_pencairan' => $request->metode_pencairan,
        'nomor_rekening'   => $request->nomor_rekening,
        'status'           => $newStatus,
    ]);

    return redirect()->route('admin.pencairan_saldo.index')
        ->with('success', 'Data pencairan berhasil diperbarui.');
}


    public function destroy($id)
    {
        $pencairan = PencairanSaldo::findOrFail($id);
        $pencairan->delete();

        return redirect()->route('admin.pencairan_saldo.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
