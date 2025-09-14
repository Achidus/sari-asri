<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PencairanSaldo;
use App\Models\Nasabah;
use App\Models\Permission;


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
    // simpan pencairan saldo dulu
$pencairan = PencairanSaldo::create([
    'nasabah_id'       => $request->nasabah_id,
    'jumlah_pencairan' => $request->jumlah_pencairan,
    'metode_pencairan' => $request->metode_pencairan,
    'nomor_rekening'   => $request->nomor_rekening,
    'status'           => 'pending', // admin cuma boleh pending
]);

// bikin request permission
Permission::create([
    'admin_id'   => auth()->id(),
    'table_name' => 'pencairan_saldo',
    'record_id'  => $pencairan->id,   // ✅ ada nilainya sekarang
    'action'     => 'approve_or_reject',
    'status'     => 'pending',
]);


    return redirect()->route('admin.pencairan_saldo.index')
        ->with('info', 'Permintaan pencairan saldo sudah dikirim, menunggu persetujuan petugas.');
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

    // ✅ Cek role user
    if (auth()->user()->role === 'admin') {
        // Admin tidak boleh ubah status
        $newStatus = 'pending';
    } else {
        // Petugas boleh ubah
        $request->validate([
            'status' => 'required|in:pending,disetujui,ditolak',
        ]);
        $newStatus = $request->status;
    }

    // kalau status lama disetujui → lalu diganti pending/ditolak → saldo dikembalikan
    if ($oldStatus === 'disetujui' && in_array($newStatus, ['pending', 'ditolak'])) {
        $nasabah->saldo->saldo += $pencairan->jumlah_pencairan;
        $nasabah->saldo->save();
    }

    // kalau status lama bukan disetujui → lalu diganti jadi disetujui → saldo dikurangi
    if ($oldStatus !== 'disetujui' && $newStatus === 'disetujui') {
        if ($nasabah->saldo->saldo < $pencairan->jumlah_pencairan) {
            return back()->withErrors(['saldo' => 'Saldo nasabah tidak mencukupi.']);
        }

        $nasabah->saldo->saldo -= $pencairan->jumlah_pencairan;
        $nasabah->saldo->save();
    }

    // update data pencairan
    $pencairan->update([
        'nasabah_id'       => $pencairan->nasabah_id,
        'jumlah_pencairan' => $pencairan->jumlah_pencairan,
        'metode_pencairan' => $pencairan->metode_pencairan,
        'nomor_rekening'   => $pencairan->nomor_rekening,
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
