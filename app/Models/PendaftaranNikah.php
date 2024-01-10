<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranNikah extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_pernikahan';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pendaftaran) {
            do {
                $pendaftaran->kode_pendaftar = \Str::random(12);
            } while (static::where('kode_pendaftar', $pendaftaran->kode_pendaftar)->exists());
        });
    }

    public function calpenPria(){
        return $this->belongsTo(CalonPengantin::class, 'calpen_pria_id');
    }

    public function calpenWanita(){
        return $this->belongsTo(CalonPengantin::class, 'calpen_wanita_id');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function kua(){
        return $this->belongsTo(KantorUrusanAgama::class, 'kua_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dokumen()
    {
        return $this->belongsToMany(Dokumen::class, 'persetujuan_dokumen', 'pernikahan_id', 'dokumen_id')->withPivot('status_calpen_pria', 'status_calpen_wanita');
    }
}
