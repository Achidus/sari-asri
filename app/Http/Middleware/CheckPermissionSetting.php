<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;

class CheckPermissionSetting
{
    public function handle($request, Closure $next)
    {
        $setting = Setting::first();

        // Biar bisa dipakai di view
        view()->share('requirePermission', $setting?->require_permission ?? true);

        return $next($request);
    }
}

