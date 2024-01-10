<?php

namespace Database\Seeders;

use App\Models\KantorUrusanAgama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kuaData = [
            [
                'kecamatan' => 'Kecamatan Morotai Selatan',
                'alamat' => 'Alamat Morotai Selatan',
                'informasi_kontak' => 'Kontak Morotai Selatan',
                'jumlah_penghulu' => 5,
                'latitude' => '123.456',
                'longitude' => '456.789',
            ],
            [
                'kecamatan' => 'Kecamatan Morotai Utara',
                'alamat' => 'Alamat Morotai Utara',
                'informasi_kontak' => 'Kontak Morotai Utara',
                'jumlah_penghulu' => 3,
                'latitude' => '123.456',
                'longitude' => '456.789',
            ],
            [
                'kecamatan' => 'Kecamatan Morotai Barat',
                'alamat' => 'Alamat Morotai Barat',
                'informasi_kontak' => 'Kontak Morotai Barat',
                'jumlah_penghulu' => 3,
                'latitude' => '123.456',
                'longitude' => '456.789',
            ],
            [
                'kecamatan' => 'Kecamatan Morotai Jaya',
                'alamat' => 'Alamat Morotai Jaya',
                'informasi_kontak' => 'Kontak Morotai Jaya',
                'jumlah_penghulu' => 3,
                'latitude' => '123.456',
                'longitude' => '456.789',
            ],
            [
                'kecamatan' => 'Kecamatan Morotai Timur',
                'alamat' => 'Alamat Morotai Timur',
                'informasi_kontak' => 'Kontak Morotai Timur',
                'jumlah_penghulu' => 3,
                'latitude' => '123.456',
                'longitude' => '456.789',
            ],
            [
                'kecamatan' => 'Kecamatan Pulau Rao',
                'alamat' => 'Alamat Pulau Rao',
                'informasi_kontak' => 'Kontak Pulau Rao',
                'jumlah_penghulu' => 3,
                'latitude' => '123.456',
                'longitude' => '456.789',
            ],
            // Tambahkan data KUA lainnya sesuai kebutuhan
        ];

        foreach ($kuaData as $data) {
            KantorUrusanAgama::create($data);
        }
    }
}
