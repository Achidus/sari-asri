<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'admin_id',
        'action',
        'table_name',
        'record_id',
        'status',
        'payload',
        'row_number',   
        'approved_by',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    // Relasi admin yang mengajukan permintaan
   public function petugas()
{
    return $this->belongsTo(\App\Models\Petugas::class, 'admin_id');
}


    // Relasi petugas yang menyetujui
    public function approvedBy()
    {
        return $this->belongsTo(Petugas::class, 'approved_by');
    }
}
