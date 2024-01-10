<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendor';
    protected $guarded = [];
    protected $casts = [
        'galeri_foto' => 'array',
        'caption_galeri' => 'array',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'vendor_id');
    }

    public function getHargaAttribute($value)
    {
        // Mengubah harga dari integer ke format mata uang Rupiah
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}
