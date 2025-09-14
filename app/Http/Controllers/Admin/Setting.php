<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Setting extends Controller
{
    // Menampilkan halaman setting
    public function index()
    {
        // ganti dengan view yang sesuai
        return view('pages.admin.setting.index');
    }

    // Menyimpan perubahan setting
    public function update(Request $request)
    {
        // contoh validasi
        $data = $request->validate([
            'site_name' => 'required|string|max:255',
            'email' => 'nullable|email',
        ]);

        // Simpan data ke database atau file config sesuai kebutuhan
        // Setting::updateOrCreate(...);

        return redirect()->back()->with('success', 'Setting berhasil diperbarui.');
    }
}
