<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengepul;
use App\Models\Sampah;
use App\Models\PengirimanPengepul;
use App\Models\DetailPengiriman;
use App\Models\Permission;
use App\Models\Setting;
use App\Services\PermissionService;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengirimanPengepulController extends Controller
{
    public function index(Request $request)
    {
        $query = PengirimanPengepul::with('pengepul');

        if ($request->filled('q')) {
            $search = $request->q;

            $query->where(function ($q) use ($search) {
                $q->where('kode_pengiriman', 'like', '%' . $search . '%')
                  ->orWhere('tanggal_pengiriman', 'like', '%' . $search . '%')
                  ->orWhereHas('pengepul', function ($q2) use ($search) {
                      $q2->where('nama', 'like', '%' . $search . '%');
                  });
            });
        }

        $pengirimanSampah = $query->paginate(10)->withQueryString();

        $pengirimanSampah->getCollection()->transform(function ($pengiriman) {
            $pengiriman->total_berat = DetailPengiriman::where('pengiriman_id', $pengiriman->id)->sum('berat_kg');
            $pengiriman->jumlah_jenis_sampah = DetailPengiriman::where('pengiriman_id', $pengiriman->id)
                ->distinct('sampah_id')
                ->count('sampah_id');
            return $pengiriman;
        });

        return view('pages.admin.pengiriman.index', compact('pengirimanSampah'));
    }

    public function generateUniqueShippingCode()
    {
        $today = now()->format('Ymd');
        $prefix = "BSR-{$today}-PENG-";

        $lastShipping = PengirimanPengepul::where('kode_pengiriman', 'like', $prefix . '%')
            ->orderBy('kode_pengiriman', 'desc')
            ->first();

        if (!$lastShipping) {
            return $prefix . '001';
        }

        $lastNumber = substr($lastShipping->kode_pengiriman, -3);
        $newNumber = str_pad((int)$lastNumber + 1, 3, '0', STR_PAD_LEFT);

        return $prefix . $newNumber;
    }

    public function create()
    {
        $pengepulList = Pengepul::all();
        $kodePengiriman = $this->generateUniqueShippingCode();

        $stokSampah = Sampah::with(['detailTransaksi', 'detailPengiriman'])
            ->get()
            ->map(function ($sampah) {
                $totalSetoran = $sampah->detailTransaksi->sum('berat_kg');
                $totalPengiriman = $sampah->detailPengiriman->sum('berat_kg');
                $sampah->stok = $totalSetoran - $totalPengiriman;
                return $sampah;
            });

        return view('pages.admin.pengiriman.create', compact('pengepulList', 'stokSampah', 'kodePengiriman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pengepul_id' => 'required|exists:pengepul,id',
            'tanggal_pengiriman' => 'required|date',
            'sampah_id' => 'required|array',
            'sampah_id.*' => 'exists:sampah,id',
            'berat_kg' => 'required|array',
            'berat_kg.*' => 'numeric|min:0',
            'harga_per_kg' => 'required|array',
            'harga_per_kg.*' => 'numeric|min:1',
        ]);

        $payload = $request->all();
        $setting = Setting::first();

        if ($setting && $setting->require_permission) {
            Permission::create([
                'admin_id'   => auth()->id(),
                'table_name' => 'pengiriman_pengepul',
                'record_id'  => 0, // record_id diisi setelah approve
                'action'     => 'create',
                'payload'    => json_encode($payload),
                'status'     => 'pending',
            ]);
            Alert::info('Menunggu Persetujuan', 'Pengiriman menunggu persetujuan petugas.');
            return redirect()->route('admin.pengiriman.index');
        }

        // langsung eksekusi kalau tidak butuh izin
        $this->executeStore($request);
        Alert::success('Berhasil!', 'Pengiriman berhasil ditambahkan.');
        return redirect()->route('admin.pengiriman.index');
    }

    private function executeStore($request)
    {
        $pengiriman = PengirimanPengepul::create([
            'kode_pengiriman' => $request->kode_pengiriman,
            'pengepul_id' => $request->pengepul_id,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
        ]);

        $totalHargaKeseluruhan = 0;

        foreach ($request->sampah_id as $index => $sampahId) {
            $beratPengiriman = $request->berat_kg[$index];
            $hargaPerKg = $request->harga_per_kg[$index];

            $stokSampah = Sampah::with(['detailTransaksi', 'detailPengiriman'])->find($sampahId);
            $totalSetoran = $stokSampah->detailTransaksi->sum('berat_kg');
            $totalPengiriman = $stokSampah->detailPengiriman->sum('berat_kg');
            $stokTersedia = $totalSetoran - $totalPengiriman;

            if ($beratPengiriman > $stokTersedia) {
                throw new \Exception("Stok sampah '{$stokSampah->nama_sampah}' tidak mencukupi. Tersedia {$stokTersedia} kg.");
            }

            $hargaTotal = $beratPengiriman * $hargaPerKg;
            $totalHargaKeseluruhan += $hargaTotal;

            DetailPengiriman::create([
                'pengiriman_id' => $pengiriman->id,
                'sampah_id' => $sampahId,
                'berat_kg' => $beratPengiriman,
                'harga_per_kg' => $hargaPerKg,
                'harga_total' => $hargaTotal,
            ]);
        }

        $pengiriman->update(['total_harga' => $totalHargaKeseluruhan]);
    }

    public function edit($id)
    {
        $pengiriman = PengirimanPengepul::with(['details', 'pengepul'])->findOrFail($id);
        $pengepulList = Pengepul::all();

        $stokSampah = Sampah::with(['detailTransaksi', 'detailPengiriman'])
            ->get()
            ->map(function ($sampah) {
                $totalSetoran = $sampah->detailTransaksi->sum('berat_kg');
                $totalPengiriman = $sampah->detailPengiriman->sum('berat_kg');
                $sampah->stok = $totalSetoran - $totalPengiriman;
                return $sampah;
            });

        return view('pages.admin.pengiriman.edit', compact('pengiriman', 'pengepulList', 'stokSampah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pengepul_id' => 'required|exists:pengepul,id',
            'tanggal_pengiriman' => 'required|date',
            'sampah_id' => 'required|array',
            'sampah_id.*' => 'exists:sampah,id',
            'berat_kg' => 'required|array',
            'berat_kg.*' => 'numeric|min:0',
            'harga_per_kg' => 'required|array',
            'harga_per_kg.*' => 'numeric|min:1',
        ]);

        $payload = $request->all();
        $setting = Setting::first();

        if ($setting && $setting->require_permission) {
            Permission::create([
                'admin_id'   => auth()->id(),
                'table_name' => 'pengiriman_pengepul',
                'record_id'  => $id,
                'action'     => 'update',
                'payload'    => json_encode($payload),
                'status'     => 'pending',
            ]);
            Alert::info('Menunggu Persetujuan', 'Update pengiriman menunggu persetujuan petugas.');
            return redirect()->route('admin.pengiriman.index');
        }

        // langsung eksekusi
        $this->executeUpdate($request, $id);
        Alert::success('Berhasil!', 'Pengiriman berhasil diperbarui.');
        return redirect()->route('admin.pengiriman.index');
    }

    private function executeUpdate($request, $id)
    {
        DB::beginTransaction();
        try {
            $pengiriman = PengirimanPengepul::findOrFail($id);

            $pengiriman->update([
                'pengepul_id' => $request->pengepul_id,
                'tanggal_pengiriman' => $request->tanggal_pengiriman,
            ]);

            $pengiriman->details()->delete();

            $totalHargaKeseluruhan = 0;

            foreach ($request->sampah_id as $index => $sampahId) {
                $beratPengiriman = $request->berat_kg[$index];
                $hargaPerKg = $request->harga_per_kg[$index];

                $stokSampah = Sampah::with(['detailTransaksi', 'detailPengiriman'])->find($sampahId);
                $totalSetoran = $stokSampah->detailTransaksi->sum('berat_kg');
                $totalPengiriman = $stokSampah->detailPengiriman->where('pengiriman_id', '!=', $id)->sum('berat_kg');
                $stokTersedia = $totalSetoran - $totalPengiriman;

                if ($beratPengiriman > $stokTersedia) {
                    throw new \Exception("Stok sampah '{$stokSampah->nama_sampah}' tidak mencukupi. Tersedia {$stokTersedia} kg.");
                }

                $hargaTotal = $beratPengiriman * $hargaPerKg;
                $totalHargaKeseluruhan += $hargaTotal;

                DetailPengiriman::create([
                    'pengiriman_id' => $pengiriman->id,
                    'sampah_id' => $sampahId,
                    'berat_kg' => $beratPengiriman,
                    'harga_per_kg' => $hargaPerKg,
                    'harga_total' => $hargaTotal,
                ]);
            }

            $pengiriman->update(['total_harga' => $totalHargaKeseluruhan]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function show($id)
    {
        $pengiriman = PengirimanPengepul::with('detailPengiriman.sampah', 'pengepul')->findOrFail($id);
        $detailPengiriman = $pengiriman->detailPengiriman;
        $totalBerat = $detailPengiriman->sum('berat_kg');
        $jumlahJenisSampah = $detailPengiriman->count();

        return view('pages.admin.pengiriman.detail', compact(
            'pengiriman',
            'detailPengiriman',
            'totalBerat',
            'jumlahJenisSampah'
        ));
    }

    public function destroy($id)
    {
        $setting = Setting::first();

        if ($setting && $setting->require_permission) {
            Permission::create([
                'admin_id'   => auth()->id(),
                'table_name' => 'pengiriman_pengepul',
                'record_id'  => $id,
                'action'     => 'delete',
                'status'     => 'pending',
            ]);
            Alert::info('Menunggu Persetujuan', 'Penghapusan pengiriman menunggu persetujuan petugas.');
            return back();
        }

        DB::beginTransaction();
        try {
            $pengiriman = PengirimanPengepul::findOrFail($id);
            $pengiriman->details()->delete();
            $pengiriman->delete();
            DB::commit();
            Alert::success('Berhasil!', 'Pengiriman berhasil dihapus.');
            return redirect()->route('admin.pengiriman.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
