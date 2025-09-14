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
    $perPage = $permissions->perPage(); // ambil jumlah per halaman

    foreach ($permissions as $index => $permission) {
        $recordNumber = ($page - 1) * $perPage + ($index + 1);
        $permission->record_number = $recordNumber;
    }

    $setting = Setting::first(); // ambil setting

    return view('pages.petugas.permissions.index', compact('permissions', 'setting'));
}



    public function approve($id)
{
    $permission = Permission::findOrFail($id);

    DB::beginTransaction();
    try {
        $performed = false;
        $table = $permission->table_name;
        $action = $permission->action;

        // Cari model
        switch ($table) {
            case 'kas':
                $model = \App\Models\Kas::find($permission->record_id);
                break;
            case 'artikel':
                $model = \App\Models\Artikel::find($permission->record_id);
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
            $payload = is_string($permission->payload) ? json_decode($permission->payload, true) : $permission->payload;
            $model->update($payload ?? []);
            $performed = true;
        }

        if (!$performed) {
            throw new \Exception("Aksi tidak dijalankan.");
        }

        // ✅ langsung hapus record permission agar tidak menumpuk
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

    // langsung hapus (nggak disimpan status rejected)
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
