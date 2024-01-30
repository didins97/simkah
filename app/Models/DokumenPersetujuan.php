<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DokumenPersetujuan extends Pivot
{
    use HasFactory;

    protected $table = 'persetujuan_dokumen';
    protected $fillable = ['dokumen_id', 'pernikahan_id', 'status_calpen_pria', 'status_calpen_wanita'];

    public static function createWithStatusCalpenFields($pernikahanId, $dokumenId, $dokumenKode, $request)
    {
        $persyaratan = new self;
        $persyaratan->pernikahan_id = $pernikahanId;
        $persyaratan->dokumen_id = $dokumenId;

        switch ($dokumenKode) {
            case 'SDDU':
                $priaField = $request->surat_dispen_dibawah_umur_suami;
                $wanitaField = $request->surat_dispen_dibawah_umur_istri;
                break;
            case 'SAC':
                $priaField = $request->surat_akta_cerai_suami;
                $wanitaField = $request->surat_akta_cerai_ibu;
                break;
            case 'SIC':
                $priaField = $request->surat_izin_komandan_suami;
                $wanitaField = $request->surat_izin_komandan_istri;
                break;
            case 'SAK':
                $priaField = $request->surat_akta_kematian_suami;
                $wanitaField = $request->surat_akta_kematian_istri;
                break;
            case 'SIK':
                $priaField = $request->surat_izin_kedutaan_wna_suami;
                $wanitaField = $request->surat_izin_kedutaan_wna_istri;
                break;
            case 'SRN':
                $priaField = $request->nikah_diluar;
                $wanitaField = $request->nikah_diluar;
                break;
        }

        $persyaratan->status_calpen_pria = $priaField ?? 0;
        $persyaratan->status_calpen_wanita = $wanitaField ?? 0;

        return $persyaratan;
    }

    public function pernikahan() {
        return $this->belongsTo(PendaftaranNikah::class, 'pernikahan_id');
    }
}
