<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $vendor1 = User::where('email', 'didinvendor@app.com')->first();
        $vendor2 = User::where('email', 'arhamvendor@app.com')->first();

        $jenisLayanan = ['foto_video', 'katering', 'dekorasi', 'rias', 'busana', 'undangan', 'kord_pernikahan'];

        $galleries_foto_array = [
            'noimage.jpg',
            'noimage.jpg',
            'noimage.jpg',
        ];

        $caption_array = [
            'Caption gambar 1',
            'Caption gambar 2',
            'Caption gambar 3',
        ];

        $galleries_serialized = serialize($galleries_foto_array);
        $caption_serialized = serialize($caption_array);

        for ($i = 1; $i <= 10; $i++) {
            $jenis = $faker->randomElement($jenisLayanan);
            Vendor::create([
                'nama' => $faker->firstName().' '.$this->generateTitleLayanan($jenis),
                'harga' => '1000000',
                'jenis_layanan' => $jenis,
                'kontak' => '081234567890',
                'keterangan' => $faker->paragraph(),
                'gambar' => 'noimage.jpg',
                'galeri_foto' => $galleries_serialized,
                'caption_galeri' => $caption_serialized,
                'letak' => 'Morotai',
                'latitude' => '128.40546',
                'longitude' => '2.19924',
                'status' => 'disetujui',
                'user_id' => $i > 2 ? $vendor2->id : $vendor1->id
            ]);
        }

        for ($i = 6; $i <= 20; $i++) {
            $jenis = $faker->randomElement($jenisLayanan);
            Vendor::create([
                'nama' => $faker->firstName().' '.$this->generateTitleLayanan($jenis),
                'harga' => '2000000',
                'jenis_layanan' => $jenis,
                'kontak' => '081234567890',
                'keterangan' => $faker->paragraph(),
                'gambar' => 'noimage.jpg',
                'galeri_foto' => $galleries_serialized,
                'caption_galeri' => $caption_serialized,
                'letak' => 'Morotai',
                'latitude' => '128.40546',
                'longitude' => '2.19924',
                'status' => 'menunggu_persetujuan',
                'user_id' => $i > 8 ? $vendor2->id : $vendor1->id
            ]);
        }
    }

    private function generateTitleLayanan($jenis) {
        switch ($jenis) {
            case 'foto_video':
                $title = 'Studio';
                break;
            case 'katering':
                $title = 'Catering';
                break;
            case 'dekorasi':
                $title = 'Rumah Dekor';
                break;
            case 'rias':
                $title = 'Beauty';
                break;
            case 'busana':
                $title = 'Market';
                break;
            case 'undangan':
                $title = 'Design';
                break;
            case 'kord_pernikahan':
                $title = 'Nuansa';
                break;
        }

        return $title;
    }
}
