<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRequest extends Model
{
    protected $fillable = [
        'admin_id',
        'model',
        'model_id',
        'action',
        'data',
        'status',
        'approved_by',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function approver()
    {
        return $this->belongsTo(Petugas::class, 'approved_by');
    }
}
