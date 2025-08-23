<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;

    protected $fillable = [
        'sumber_dana',
        'jumlah',
        'jenis',
        'keterangan',
        'nominal',
        'tanggal', // Hanya nama kolom
    ];

    protected $casts = [
        'tanggal' => 'date', // Casting ke date
    ];
}
