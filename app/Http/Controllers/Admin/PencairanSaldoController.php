<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PencairanSaldo;
use App\Models\Nasabah;
use App\Models\Permission;
use App\Models\Setting;
use App\Services\PermissionService;
use RealRashid\SweetAlert\Facades\Alert;

class PencairanSaldoController extends Controller
{
    public function index(Request $request)
    {
        $query = PencairanSaldo::with('nasabah');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('nasabah', function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('no_registrasi', 'like', "%{$search}%");
            });
        }

        $pencairan = $query->latest()->paginate(10);

        $pending = Permission::where('admin_id', auth()->id())
            ->where('table_name', 'pencairan_saldo')
            ->where('status', 'pending')
            ->get()
            ->keyBy('record_id');

        return view('pages.admin.pencairan_saldo.index', compact('pencairan', 'pending'));
    }

    public function create()
    {
        $nasabah = Nasabah::all();
        return view('pages.admin.pencairan_saldo.create', compact('nasabah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nasabah_id'       => 'required|exists:nasabah,id',
            'jumlah_pencairan' => 'required|numeric|min:1',
            'metode_pencairan' => 'required|string',
            'nomor_rekening'   => 'nullable|string',
        ]);

        $pencairan = PencairanSaldo::create([
            'nasabah_id'       => $request->nasabah_id,
            'jumlah_pencairan' => $request->jumlah_pencairan,
            'metode_pencairan' => $request->metode_pencairan,
            'nomor_rekening'   => $request->nomor_rekening,
            'status'           => 'pending',
        ]);

        $setting = Setting::first();
        if ($setting && $setting->require_permission) {
            Permission::create([
                'admin_id'   => auth()->id(),
                'table_name' => 'pencairan_saldo',
                'record_id'  => $pencairan->id,
                'action'     => 'approve_or_reject',
                'status'     => 'pending',
            ]);
            Alert::info('Menunggu Persetujuan', 'Permintaan pencairan saldo menunggu persetujuan petugas.');
        } else {
            // kalau tidak perlu izin, langsung setujui
            $pencairan->update(['status' => 'disetujui']);
            $nasabah = Nasabah::with('saldo')->findOrFail($pencairan->nasabah_id);
            $nasabah->saldo->saldo -= $pencairan->jumlah_pencairan;
            $nasabah->saldo->save();
            Alert::success('Berhasil!', 'Permintaan pencairan saldo langsung diproses.');
        }

        return redirect()->route('admin.pencairan_saldo.index');
    }

    public function edit($id)
    {
        $pencairan = PencairanSaldo::findOrFail($id);
        $nasabah   = Nasabah::all();
        return view('pages.admin.pencairan_saldo.edit', compact('pencairan', 'nasabah'));
    }

    public function update(Request $request, $id)
    {
        $pencairan = PencairanSaldo::findOrFail($id);
        $payload = $request->only('status');

        $setting = Setting::first();
        if ($setting && $setting->require_permission) {
            $ok = PermissionService::requestOrExecute(
                'update',
                'pencairan_saldo',
                $pencairan->id,
                $payload,
                function () use ($pencairan, $request) {
                    $this->processUpdate($pencairan, $request->status);
                }
            );

            if (!$ok) {
                Alert::info('Menunggu Persetujuan', 'Update pencairan saldo menunggu persetujuan petugas.');
                return back();
            }
        } else {
            $this->processUpdate($pencairan, $request->status);
        }

        Alert::success('Berhasil!', 'Data pencairan berhasil diperbarui.');
        return redirect()->route('admin.pencairan_saldo.index');
    }

    private function processUpdate($pencairan, $newStatus)
    {
        $nasabah = Nasabah::with('saldo')->findOrFail($pencairan->nasabah_id);
        $oldStatus = $pencairan->status;

        if ($oldStatus !== 'disetujui' && $newStatus === 'disetujui') {
            if ($nasabah->saldo->saldo < $pencairan->jumlah_pencairan) {
                throw new \Exception('Saldo nasabah tidak mencukupi.');
            }
            $nasabah->saldo->saldo -= $pencairan->jumlah_pencairan;
            $nasabah->saldo->save();
        }

        if ($oldStatus === 'disetujui' && in_array($newStatus, ['pending', 'ditolak'])) {
            $nasabah->saldo->saldo += $pencairan->jumlah_pencairan;
            $nasabah->saldo->save();
        }

        $pencairan->update(['status' => $newStatus]);
    }

    public function destroy($id)
    {
        $pencairan = PencairanSaldo::findOrFail($id);
        $setting = Setting::first();

        if ($setting && $setting->require_permission) {
            $ok = PermissionService::requestOrExecute(
                'delete',
                'pencairan_saldo',
                $pencairan->id,
                null,
                fn() => $pencairan->delete()
            );

            if (!$ok) {
                Alert::info('Menunggu Persetujuan', 'Penghapusan pencairan saldo menunggu persetujuan petugas.');
                return back();
            }
        } else {
            $pencairan->delete();
        }

        Alert::success('Berhasil!', 'Data pencairan berhasil dihapus.');
        return redirect()->route('admin.pencairan_saldo.index');
    }
}
