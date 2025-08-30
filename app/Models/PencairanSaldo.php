<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencairanSaldo extends Model
{
    use HasFactory;

    protected $table = 'pencairan_saldo';

    protected $fillable = [
        'nasabah_id',
        'jumlah_pencairan',
        'metode_pencairan',
        'nomor_rekening',
        'status',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id');
    }
}
