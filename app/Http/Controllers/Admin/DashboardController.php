<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nasabah;
use App\Models\Petugas;
use App\Models\Sampah;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Saldo;
use App\Models\Artikel;
use App\Models\Feedback;
use App\Models\PencairanSaldo;
use App\Models\PengirimanPengepul;
use App\Models\DetailPengiriman;
use Illuminate\Support\Facades\DB;
use App\Models\Kas;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik utama
        $totalNasabah = Nasabah::count();
        $totalPetugas = Petugas::count();
        $totalSampahTerkumpul = DetailTransaksi::sum('berat_kg');
        $totalTransaksiSetoran = Transaksi::count();
        $totalSaldoNasabah = Saldo::sum('saldo');
        $totalPermintaanPencairan = PencairanSaldo::where('status', 'pending')->count();
        $totalFeedbackMasuk = Feedback::count();
        $totalArtikel = Artikel::count();

        // Perhitungan stok
        $totalStokSampah = Sampah::with(['detailTransaksi', 'detailPengiriman'])
            ->get()
            ->sum(function ($sampah) {
                return $sampah->detailTransaksi->sum('berat_kg') - $sampah->detailPengiriman->sum('berat_kg');
            });

        $totalSampahTerkirim = DetailPengiriman::sum('berat_kg');

        // Keuntungan dari saldo
        $totalKeuntungan = Saldo::select(DB::raw('SUM(saldo * 0.25) as keuntungan'))->value('keuntungan');
        $totalSaldoBersih = Saldo::sum(DB::raw('saldo * 0.75'));

        // Total Kas Masuk & Keluar
        $totalKasMasuk = Kas::where('jenis', 'masuk')->sum('nominal');
        $totalKasKeluar = Kas::where('jenis', 'keluar')->sum('nominal');

        // Total Saldo Bank
        $totalSaldoBank = $totalKasMasuk + $totalKeuntungan - $totalKasKeluar;

        // Nasabah terbaik
        $nasabahTerbaik = Nasabah::withCount(['transaksi as total_setoran' => function ($query) {
            $query->where('tanggal_transaksi', '>=', now()->subMonth());
        }])->orderBy('total_setoran', 'desc')->take(10)->get();

        // Data chart
        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $transaksiPerBulan = [];
        $kasMasukPerBulan = [];
        $kasKeluarPerBulan = [];
        $sampahMasukPerBulan = [];
        $sampahTerkirimPerBulan = [];
        $saldoBersihPerBulan = [];
        $tahunIni = date('Y');

        foreach (range(1, 12) as $month) {
            // Jumlah transaksi
            $transaksiPerBulan[] = Transaksi::whereMonth('created_at', $month)
                ->whereYear('created_at', $tahunIni)
                ->count();

            // Kas masuk & keluar per bulan
            $kasMasukBulan = Kas::where('jenis','masuk')
                ->whereMonth('created_at',$month)
                ->whereYear('created_at', $tahunIni)
                ->sum('nominal');


            $kasKeluarBulan = Kas::where('jenis','keluar')
                ->whereMonth('created_at',$month)
                ->whereYear('created_at', $tahunIni)
                ->sum('nominal');

            $kasMasukPerBulan[] = $kasMasukBulan;
            $kasKeluarPerBulan[] = $kasKeluarBulan;

            // Sampah masuk & terkirim
            $sampahMasukPerBulan[] = DetailTransaksi::whereMonth('created_at',$month)
                ->whereYear('created_at', $tahunIni)
                ->sum('berat_kg');

            $sampahTerkirimPerBulan[] = DetailPengiriman::whereMonth('created_at',$month)
                ->whereYear('created_at', $tahunIni)
                ->sum('berat_kg');
$nasabahAktifPerBulan = [];
$nasabahTidakAktifPerBulan = [];

foreach (range(1, 12) as $month) {
    $nasabahAktifPerBulan[] = Nasabah::where('status', 'aktif')
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $tahunIni)
        ->count();

    $nasabahTidakAktifPerBulan[] = Nasabah::where('status', '!=', 'aktif')
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $tahunIni)
        ->count();
}

            // Saldo bersih per bulan (non-kumulatif)
            $keuntunganBulan = Saldo::whereMonth('created_at',$month)
                ->whereYear('created_at', $tahunIni)
                ->sum(DB::raw('saldo * 0.25'));

            $saldoBersihPerBulan[] = $kasMasukBulan + $keuntunganBulan - $kasKeluarBulan;
        }

        return view('pages.admin.dashboard', compact(
            'totalNasabah',
            'totalPetugas',
            'totalSampahTerkumpul',
            'totalTransaksiSetoran',
            'totalSaldoNasabah',
            'totalPermintaanPencairan',
            'totalFeedbackMasuk',
            'totalArtikel',
            'totalStokSampah',
            'totalSampahTerkirim',
            'totalKeuntungan',
            'totalSaldoBersih',
            'totalSaldoBank',
            'nasabahTerbaik',
            'bulan',
            'transaksiPerBulan',
            'kasMasukPerBulan',
            'kasKeluarPerBulan',
            'sampahMasukPerBulan',
            'sampahTerkirimPerBulan',
            'saldoBersihPerBulan',
            'nasabahAktifPerBulan',
    'nasabahTidakAktifPerBulan'


        ));
    }
}
