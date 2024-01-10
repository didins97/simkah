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
}
