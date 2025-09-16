<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->paginate(10);

        $page = request()->get('page', 1);
        $perPage = $permissions->perPage();

        foreach ($permissions as $index => $permission) {
            $recordNumber = ($page - 1) * $perPage + ($index + 1);
            $permission->record_number = $recordNumber;
        }

        $setting = Setting::first();

        return view('pages.petugas.permissions.index', compact('permissions', 'setting'));
    }

    public function approve($id)
    {
        $permission = Permission::findOrFail($id);

        DB::beginTransaction();
        try {
            $performed = false;
            $table     = $permission->table_name;
            $action    = $permission->action;

            // Cari model
            switch ($table) {
                case 'transaksi_setoran':
                    $model = \App\Models\Transaksi::with('detailTransaksi.sampah')
                        ->find($permission->record_id);
                    break;

                case 'kas':
                    $model = \App\Models\Kas::find($permission->record_id);
                    break;

                case 'artikel':
                    $model = \App\Models\Artikel::find($permission->record_id);
                    break;

                case 'pencairan_saldo':
                    $model = \App\Models\PencairanSaldo::find($permission->record_id);
                    break;

                default:
                    $modelClass = "\\App\\Models\\" . Str::studly($table);
                    $model = class_exists($modelClass) ? $modelClass::find($permission->record_id) : null;
                    break;
            }

            // Jalankan aksi
            if ($action === 'delete') {
                if ($model) $model->delete();
                $performed = true;

            } elseif ($action === 'update') {
                if (!$model) {
                    throw new \Exception("Data pada tabel {$table} dengan id {$permission->record_id} tidak ditemukan.");
                }

                $payload = is_string($permission->payload)
                    ? json_decode($permission->payload, true)
                    : $permission->payload;
                $payload = $payload ?? [];

                if ($table === 'transaksi_setoran') {
                    // Update transaksi & detail
                    $model->update([
                        'nasabah_id'        => $payload['nasabah_id'] ?? $model->nasabah_id,
                        'tanggal_transaksi' => $payload['tanggal_transaksi'] ?? $model->tanggal_transaksi,
                        'total'             => $payload['total'] ?? $model->total ?? null,
                    ]);

                    $model->detailTransaksi()->delete();

                    foreach ($payload['detail_transaksi'] ?? [] as $detail) {
                        $sampah_id    = $detail['sampah_id'] ?? $detail['id'] ?? null;
                        $berat        = $detail['berat_kg'] ?? $detail['jumlah'] ?? $detail['weight'] ?? null;
                        $harga_per_kg = $detail['harga_per_kg'] ?? $detail['harga'] ?? $detail['price'] ?? null;
                        $harga_total  = $detail['harga_total'] ?? $detail['subtotal']
                            ?? ($berat !== null && $harga_per_kg !== null ? ($berat * $harga_per_kg) : null);

                        if (!$sampah_id || $berat === null || $harga_per_kg === null) {
                            throw new \Exception("Payload detail_transaksi tidak lengkap.");
                        }

                        \App\Models\DetailTransaksi::create([
                            'transaksi_id' => $model->id,
                            'sampah_id'    => $sampah_id,
                            'berat_kg'     => $berat,
                            'harga_per_kg' => $harga_per_kg,
                            'harga_total'  => $harga_total,
                        ]);
                    }

                } elseif ($table === 'pencairan_saldo') {
                    $nasabah   = \App\Models\Nasabah::with('saldo')->findOrFail($model->nasabah_id);
                    $oldStatus = $model->status;
                    $oldJumlah = $model->jumlah_pencairan;

                    $newStatus = $payload['status'] ?? $oldStatus;
                    $newJumlah = $payload['jumlah_pencairan'] ?? $oldJumlah;

                    // rollback dulu kalau status lama sudah disetujui
                    if ($oldStatus === 'disetujui') {
                        $nasabah->saldo->saldo += $oldJumlah;
                    }

                    // jika status baru disetujui, potong saldo sesuai jumlah baru
                    if ($newStatus === 'disetujui') {
                        if ($nasabah->saldo->saldo < $newJumlah) {
                            throw new \Exception('Saldo nasabah tidak mencukupi untuk pencairan baru.');
                        }
                        $nasabah->saldo->saldo -= $newJumlah;
                    }

                    $nasabah->saldo->save();

                    $model->update([
                        'status'           => $newStatus,
                        'jumlah_pencairan' => $newJumlah,
                    ]);

                } else {
                    $model->update($payload ?? []);
                }

                $performed = true;

            } elseif ($action === 'approve_or_reject' && $table === 'pencairan_saldo') {
                if (!$model) {
                    throw new \Exception("Data pencairan saldo tidak ditemukan.");
                }

                // default → setujui
                $nasabah = \App\Models\Nasabah::with('saldo')->findOrFail($model->nasabah_id);

                if ($nasabah->saldo->saldo < $model->jumlah_pencairan) {
                    throw new \Exception("Saldo nasabah tidak mencukupi.");
                }

                $nasabah->saldo->saldo -= $model->jumlah_pencairan;
                $nasabah->saldo->save();

                $model->update(['status' => 'disetujui']);

                $performed = true;
            }

            if (!$performed) {
                throw new \Exception("Aksi tidak dijalankan.");
            }

            // hapus permission setelah berhasil
            $permission->delete();

            DB::commit();
            Alert::success('Disetujui', 'Permintaan berhasil dieksekusi dan dihapus.');
            return back();

        } catch (\Throwable $e) {
            DB::rollBack();
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }

    public function reject($id)
    {
        $permission = Permission::findOrFail($id);

        if ($permission->table_name === 'pencairan_saldo') {
            $model = \App\Models\PencairanSaldo::find($permission->record_id);
            if ($model) {
                $model->update(['status' => 'ditolak']);
            }
        }

        $permission->delete();

        Alert::info('Ditolak', 'Permintaan berhasil ditolak dan dihapus.');
        return back();
    }

    public function toggle(Request $request)
    {
        $setting = Setting::firstOrCreate([]);
        $setting->update([
            'require_permission' => $request->has('require_permission')
        ]);

        Alert::success('Sukses', 'Pengaturan sistem persetujuan diperbarui.');
        return back();
    }
}
