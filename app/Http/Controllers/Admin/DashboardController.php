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
                $totalMasuk = $sampah->detailTransaksi->sum('berat_kg');
                $totalKeluar = $sampah->detailPengiriman->sum('berat_kg');
                return $totalMasuk - $totalKeluar;
            });

        $totalSampahTerkirim = DetailPengiriman::sum('berat_kg');

        // Keuntungan dari pengiriman
        $totalKeuntungan = Saldo::select(DB::raw('SUM(saldo * 0.25) as keuntungan'))->value('keuntungan');


$totalSaldoBersih = Saldo::sum(DB::raw('saldo * 0.75'));
// Total Kas Masuk
$totalKasMasuk = Kas::where('jenis', 'masuk')->sum('nominal');

// Total Kas Keluar
$totalKasKeluar = Kas::where('jenis', 'keluar')->sum('nominal');

// Total Keuntungan Bank Sampah
// Jika sudah dihitung sebelumnya sebagai $totalKeuntungan, pakai itu
// Total Saldo Bank
$totalSaldoBank = $totalKasMasuk + $totalKeuntungan - $totalKasKeluar;

        // Nasabah terbaik
        $nasabahTerbaik = Nasabah::withCount(['transaksi as total_setoran' => function ($query) {
            $query->where('tanggal_transaksi', '>=', now()->subMonth());
        }])->orderBy('total_setoran', 'desc')->take(10)->get();

        // Data untuk chart
        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $transaksiPerBulan = [];

        foreach (range(1, 12) as $month) {
            $transaksiPerBulan[] = Transaksi::whereMonth('created_at', $month)->count();
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
            'transaksiPerBulan'
            
        
        ));
    }
}
