<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanPengepul extends Model
{
    use HasFactory;

    protected $table = 'pengiriman_pengepul';

    protected $fillable = [
        'kode_pengiriman',
        'tanggal_pengiriman',
        'pengepul_id'
    ];

    // app/Models/PengirimanPengepul.php
public function pengepul()
{
    return $this->belongsTo(Pengepul::class, 'pengepul_id');
}



    public function detailPengiriman()
    {
        return $this->hasMany(DetailPengiriman::class, 'pengiriman_id');
    }
    // app/Models/PengirimanPengepul.php

public function details()
{
    return $this->hasMany(DetailPengiriman::class, 'pengiriman_id');
}

protected $casts = [
    'tanggal_pengiriman' => 'datetime',
];

}
