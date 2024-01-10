<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorUrusanAgama extends Model
{
    use HasFactory;

    protected $table = 'list_kua';

    protected $fillable = [
        // 'nama_kua',
        'alamat',
        'kecamatan',
        'informasi_kontak',
        'jumlah_penghulu',
        'latitude',
        'longitude',
        // 'foto_kua',
        // 'informasi_layanan',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
