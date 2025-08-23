<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $fillable = [
        'judul_postingan', 'isi_postingan', 'thumbnail', 'slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            if (empty($artikel->slug)) {
                $artikel->slug = Str::slug($artikel->judul_postingan);
            }
        });

        static::updating(function ($artikel) {
            if ($artikel->isDirty('judul_postingan')) {
                $artikel->slug = Str::slug($artikel->judul_postingan);
            }
        });
    }

    public function media()
    {
        return $this->hasMany(MediaArtikel::class, 'artikel_id');
    }
}
