<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class PermissionService
{
    public static function requestOrExecute($action, $table, $recordId, $payload = null, $callback = null)
    {
        $setting = Setting::first();

        // Kalau butuh izin → simpan permission
        if ($setting && $setting->require_permission) {
            Permission::create([
    'admin_id' => auth()->id(),
    'action' => $action,
    'table_name' => $table,
    'record_id' => $recordId,
    'row_number' => request()->get('row_number'),
    'payload' => $payload,
    'status' => 'pending',
]);

            return false; // artinya belum dieksekusi
        }

        // Kalau tidak butuh izin → langsung eksekusi
        if ($callback) {
            return $callback();
        }

        return true;
    }
}
