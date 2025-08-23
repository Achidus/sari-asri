<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Admin Controller
use App\Http\Controllers\Admin\NasabahController as AdminNasabahController;
use App\Http\Controllers\Admin\PetugasController as AdminPetugasController;
use App\Http\Controllers\Admin\SampahController as AdminSampahController;
use App\Http\Controllers\Admin\PengepulController as AdminPengepulController;
use App\Http\Controllers\Admin\BannerController as AdminBannerController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\AplikasiAndroidController as AdminAplikasiAndroidController;
use App\Http\Controllers\Admin\TokenWhatsAppController as AdminTokenWhatsAppController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\TentangKamiController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PencairanSaldoController as AdminTarikSaldoController;
use App\Http\Controllers\Admin\PengirimanPengepulController as AdminPengirimanPengepulController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;
use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\KasController as AdminKasController;
use App\Http\Controllers\ArtikelController;

// Petugas Controller
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\TransaksiController as PetugasTransaksiController;
use App\Http\Controllers\Petugas\NasabahController as PetugasNasabahController;
use Illuminate\Http\Request;
use App\Models\Sampah;
use App\Models\Nasabah;
use App\Models\Artikel;
use App\Models\PengirimanPengepul;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function (Request $request) {
    $sampahs  = Sampah::paginate(10);

    $nasabahs = Nasabah::with('saldo')
        ->when($request->search, function ($q) use ($request) {
            $s = $request->search;
            $q->where('nama_lengkap', 'like', "%$s%")
              ->orWhere('no_registrasi', 'like', "%$s%")
              ->orWhere('no_hp', 'like', "%$s%");
        })
        ->paginate(10);

    $artikels = Artikel::latest()->paginate(6);

    return view('welcome', compact('sampahs','nasabahs','artikels'));
})->name('welcome');

// Detail artikel publik
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');

// Auth
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
});

// Admin routes
Route::middleware(['auth', 'checkRole:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Data Master
    Route::resource('/data-nasabah', AdminNasabahController::class)->names('admin.nasabah');
    Route::resource('/data-petugas', AdminPetugasController::class)->names('admin.petugas');
    Route::resource('/data-sampah', AdminSampahController::class)->names('admin.sampah');
    Route::resource('/data-pengepul', AdminPengepulController::class)->names('admin.pengepul');

    // Manajemen Konten
    Route::resource('/data-banner', AdminBannerController::class)->names('admin.banner');
    Route::resource('/data-artikel', AdminArtikelController::class)->names('admin.artikel');

    // Transaksi
    Route::resource('/transaksi', AdminTransaksiController::class)->names('admin.transaksi');
    Route::get('/transaksi/print/{transaksi}', [AdminTransaksiController::class, 'print'])->name('admin.transaksi.print');
    Route::get('/transaksi/{id}/edit', [AdminTransaksiController::class, 'edit'])->name('admin.transaksi.edit');
    Route::put('/transaksi/{id}', [AdminTransaksiController::class, 'update'])->name('admin.transaksi.update');

    // Kas
    // Rute dinamis berdasarkan jenis
    Route::prefix('kas')->name('admin.kas.')->group(function () {
        Route::get('/{jenis}', [AdminKasController::class, 'index'])->name('index');
        Route::get('/{jenis}/create', [AdminKasController::class, 'create'])->name('create');
        Route::post('/{jenis}/store', [AdminKasController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminKasController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminKasController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminKasController::class, 'destroy'])->name('destroy');

        // Optional: rute khusus masuk/keluar
        Route::get('/masuk', [AdminKasController::class, 'masuk'])->name('masuk');
        Route::get('/keluar', [AdminKasController::class, 'keluar'])->name('keluar');
    });

    // Laporan
    Route::get('/laporan', [AdminLaporanController::class, 'index'])->name('admin.laporan.index');
    Route::get('/laporan/print', [AdminLaporanController::class, 'print'])->name('admin.laporan.print');

    // Tarik Saldo
    Route::get('/tarik-saldo', [AdminTarikSaldoController::class, 'index'])->name('admin.tarik-saldo.index');
    Route::post('/tarik-saldo/setujui/{id}', [AdminTarikSaldoController::class, 'setujui'])->name('admin.tarik-saldo.setujui');
    Route::post('/tarik-saldo/tolak/{id}', [AdminTarikSaldoController::class, 'tolak'])->name('admin.tarik-saldo.tolak');

    // Pengiriman
    Route::resource('/pengiriman/sampah', AdminPengirimanPengepulController::class)->names('admin.pengiriman');
    Route::put('/pengiriman/{id}', [AdminPengirimanPengepulController::class, 'update'])->name('admin.pengiriman.update');
    Route::get('/pengiriman/{id}/detail', [AdminPengirimanPengepulController::class, 'show'])->name('admin.pengiriman.detail');

    // Pengaturan
    Route::get('/token-whatsapp', [AdminTokenWhatsAppController::class, 'index'])->name('admin.token-whatsapp.index');
    Route::post('/token-whatsapp', [AdminTokenWhatsAppController::class, 'update'])->name('admin.token-whatsapp.update');
    Route::resource('/update-apk', AdminAplikasiAndroidController::class)->names('admin.aplikasi');
    Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('admin.tentang_kami.index');
    Route::post('/tentang-kami', [TentangKamiController::class, 'store'])->name('admin.tentang_kami.store');
    Route::put('/tentang-kami/update/{id}', [TentangKamiController::class, 'update'])->name('admin.tentang_kami.update');

    // Feedback
    Route::resource('/data-feedback', AdminFeedbackController::class)->names('admin.feedback');
});

// Petugas routes
Route::middleware(['auth', 'checkRole:petugas'])->prefix('petugas')->group(function () {
    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('petugas.dashboard');
    Route::resource('/data-nasabah', PetugasNasabahController::class)->names('petugas.nasabah');
    Route::resource('/transaksi', PetugasTransaksiController::class)->names('petugas.transaksi');
    Route::get('/transaksi/print/{transaksi}', [PetugasTransaksiController::class, 'print'])->name('petugas.transaksi.print');
});

// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
