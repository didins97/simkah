<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Objects\Point;

class Kecamatan extends Model
{
    use HasFactory,HasSpatial;

    protected $table = 'kecamatan';

    protected $fillable = [
        'nama',
        'latitude',
        'longitude',
        'keterangan',
        'area',
    ];

    protected $casts = [
        'lokasi' => Point::class,
        'area' => Polygon::class,
        'borderline' => 'array'
    ];

    public function pernikahan()
    {
        return $this->hasMany(PendaftaranNikah::class, 'kecamatan_id');
    }

    public function vendor()
    {
        return $this->hasMany(Vendor::class, 'kecamatan_id');
    }
}
