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

    protected $appends = ['luas_wilayah'];

    public function pernikahan()
    {
        return $this->hasMany(PendaftaranNikah::class, 'kecamatan_id');
    }

    public function vendor()
    {
        return $this->hasMany(Vendor::class, 'kecamatan_id');
    }

    // public function getLuasWilayahAttribute()
    // {
    //     $polygonData = $this->area;
    //     dd($polygonData);
    //     $coordinates = $polygonData['coordinates'][0];

    //     $area = 0;
    //     $pointCount = count($coordinates);

    //     // Iterasi melalui koordinat untuk menghitung luas wilayah
    //     for ($i = 0; $i < $pointCount - 1; $i++) {
    //         list($x1, $y1) = $coordinates[$i];
    //         list($x2, $y2) = $coordinates[$i + 1];

    //         $area += ($x1 * $y2) - ($x2 * $y1);
    //     }

    //     $area = abs($area) / 2;  // Hasil luas wilayah positif dalam unit default

    //     return $area;
    // }
}
