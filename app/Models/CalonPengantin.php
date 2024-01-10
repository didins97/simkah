<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPengantin extends Model
{
    use HasFactory;

    protected $table = 'calon_pengantin';
    protected $guarded = [];

    public function persyaratanPria()
    {
        return $this->hasMany(DokumenPersetujuan::class, 'calpen_pria_id');
    }

    public function persyaratanWanita()
    {
        return $this->hasMany(DokumenPersetujuan::class, 'calpen_wanita_id');
    }

}
