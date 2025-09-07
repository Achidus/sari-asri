<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\PencairanSaldo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Nasabah::with('saldo');

    if ($request->filled('keyword')) {
        $keyword = $request->keyword;
        $query->where(function ($q) use ($keyword) {
            $q->where('nama_lengkap', 'like', '%' . $keyword . '%')
              ->orWhere('no_registrasi', 'like', '%' . $keyword . '%')
              ->orWhere('no_hp', 'like', '%' . $keyword . '%');
        });
    }

    $nasabahs = $query->paginate(10);

    return view('pages.admin.nasabah.index', compact('nasabahs'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastNasabah = Nasabah::latest('id')->first();
$nextNumber = $lastNasabah ? $lastNasabah->id + 1 : 1;
$nomorRegistrasi = "REG" . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);


        return view('pages.admin.nasabah.create', compact('nomorRegistrasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    try {
       $request->validate([
    'no_registrasi' => 'required|unique:nasabah,no_registrasi',
    'nama_lengkap' => 'required|string|max:255|unique:nasabah,nama_lengkap',
    'alamat_lengkap' => 'required|string',
    'no_hp' => 'required|string|max:15',
    'nik' => 'required|digits:16|unique:nasabah,nik',
    'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
    'tempat_lahir' => 'required|string|max:100',
    'tanggal_lahir' => 'required|date',
    'email' => 'required|email',
    'username' => 'required|string|unique:nasabah,username|max:255',
    'password' => 'required|string|min:8',
]);

        $nasabah = Nasabah::create([
            'nama_lengkap' => $request->nama_lengkap,
            'no_registrasi' => $request->no_registrasi,
            'alamat_lengkap' => $request->alamat_lengkap,
            'no_hp' => $request->no_hp,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'username' => $request->username,
            'status' => $request->status ?? 'aktif',
            'password' => Hash::make($request->password),
        ]);

        Saldo::create([
            'nasabah_id' => $nasabah->id,
            'saldo' => 0
        ]);

        Alert::success('Berhasil!', 'Nasabah berhasil ditambahkan!')->autoclose(3000);
        return redirect()->route('admin.nasabah.index');

    } catch (\Illuminate\Validation\ValidationException $e) {
        Alert::error('Gagal!', 'Data duplikat atau tidak valid!')->autoclose(4000);
        return redirect()->back()->withErrors($e->errors())->withInput();
    }
}


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $nasabah = Nasabah::with('saldo')->findOrFail($id);

    // Riwayat setoran
    $riwayatSetoran = Transaksi::with('detailTransaksi.sampah')
        ->where('nasabah_id', $nasabah->id)
        ->orderBy('tanggal_transaksi', 'desc')
        ->get();

    // Riwayat penarikan saldo (ambil dari pencairan_saldo)
    $riwayatPenarikan = PencairanSaldo::where('nasabah_id', $nasabah->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('pages.admin.nasabah.show', compact(
        'nasabah',
        'riwayatSetoran',
        'riwayatPenarikan'
    ));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nasabah = Nasabah::findOrFail($id);

        return view('pages.admin.nasabah.edit', compact('nasabah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $nasabah = Nasabah::findOrFail($id);

    try {
       $request->validate([
    'no_registrasi' => 'required|unique:nasabah,no_registrasi,' . $nasabah->id,
    'nama_lengkap' => 'required|string|max:255|unique:nasabah,nama_lengkap,' . $nasabah->id,
    'alamat_lengkap' => 'required|string',
    'no_hp' => 'required|string|max:15',
    'nik' => 'required|digits:16|unique:nasabah,nik,' . $nasabah->id,
    'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
    'tempat_lahir' => 'required|string|max:100',
    'tanggal_lahir' => 'required|date',
    'email' => 'required|email',
    'username' => 'required|string|unique:nasabah,username,' . $nasabah->id . '|max:255',
    'password' => 'nullable|string|min:8',
    'status' => 'required|in:aktif,tidak_aktif',
]);

        $nasabah->update([
            'no_registrasi' => $request->no_registrasi,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat_lengkap' => $request->alamat_lengkap,
            'no_hp' => $request->no_hp,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'username' => $request->username,
            'status' => $request->status,
        ]);

        if ($request->filled('password')) {
            $nasabah->password = Hash::make($request->password);
            $nasabah->save();
        }

        Alert::success('Berhasil!', 'Nasabah berhasil diperbarui!')->autoclose(3000);
        return redirect()->route('admin.nasabah.index');

    } catch (\Illuminate\Validation\ValidationException $e) {
        Alert::error('Gagal!', 'Data duplikat atau tidak valid!')->autoclose(4000);
        return redirect()->back()->withErrors($e->errors())->withInput();
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $nasabah = Nasabah::findOrFail($id);
    $nasabah->delete();

    Alert::success('Berhasil!', 'Nasabah berhasil dihapus!')->autoclose(3000);
        return redirect()->route('admin.nasabah.index');
}

public function tarikSaldoForm($id)
{
    $nasabah = Nasabah::with('saldo')->findOrFail($id);

    return view('pages.admin.nasabah.tarik_saldo', compact('nasabah'));
}

public function tarikSaldo(Request $request, $id)
{
    $nasabah = Nasabah::with('saldo')->findOrFail($id);

    $request->validate([
        'jumlah' => 'required|numeric|min:1000',
        'metode' => 'required|in:tarik_tunai,transfer',
        'keterangan' => 'nullable|string|max:255'
    ]);

    $saldo = $nasabah->saldo;

    if ($saldo->saldo < $request->jumlah) {
        Alert::error('Gagal!', 'Saldo tidak mencukupi!')->autoclose(3000);
        return redirect()->back();
    }

    // Kurangi saldo
    $saldo->saldo -= $request->jumlah;
    $saldo->save();

    // Simpan ke pencairan saldo
    PencairanSaldo::create([
        'nasabah_id' => $nasabah->id,
        'jumlah' => $request->jumlah,
        'metode' => $request->metode, // tarik_tunai / transfer
        'keterangan' => $request->keterangan,
        'tanggal_pengajuan' => now(),
        'status' => 'selesai' // bisa juga pending dulu kalau perlu approval
    ]);

    Alert::success('Berhasil!', 'Saldo berhasil ditarik!')->autoclose(3000);
    return redirect()->route('admin.nasabah.show', $nasabah->id);
}

}
