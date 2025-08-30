<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    protected $fillable = [
        'no_registrasi', 'nik', 'nama_lengkap', 'jenis_kelamin',
        'tempat_lahir', 'tanggal_lahir', 'no_hp', 'email',
        'username', 'password', 'alamat_lengkap', 'foto', 'status'
    ];

    public function saldo()
    {
        return $this->hasOne(Saldo::class, 'nasabah_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'nasabah_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'nasabah_id');
    }

    public function metodePencairan()
    {
        return $this->hasMany(MetodePencairan::class, 'nasabah_id');
    }

    public function pencairanSaldo()
    {
        return $this->hasMany(PencairanSaldo::class, 'nasabah_id');
    }
    // App\Models\Nasabah.php
public function getSisaSaldoAttribute()
{
    $totalSetoran = $this->hasMany(\App\Models\Transaksi::class, 'nasabah_id')
        ->with('detailTransaksi')
        ->get()
        ->flatMap->detailTransaksi
        ->sum(function ($detail) {
            return $detail->subtotal ?? 0;
        });

    $totalPenarikan = $this->hasMany(\App\Models\PencairanSaldo::class, 'nasabah_id')
        ->where('status', 'disetujui') // hanya yang sudah dicairkan
        ->sum('jumlah_pencairan');

    return $totalSetoran - $totalPenarikan;
}

}
