<?php

namespace Database\Seeders;

use App\Models\CalonPengantin;
use App\Models\PendaftaranNikah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PendaftaranPernikahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $calonPria = CalonPengantin::create([
                'nama' => $faker->name('male'),
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Morotai',
                'tgl_lahir' => '1990-01-01',
                'umur' => 30,
                'warga_negara' => 'wni',
                'negara_asal' => null,
                'passpor' => null,
                'agama' => 'Islam',
                'status' => 'bk',
                'nohp' => '08123456789', // Nomor HP yang sesuai
                'pekerjaan' => 'Wiraswasta',
                'email' => $faker->email(),
                'alamat' => 'Daruba Pantai',
                'pendidikan' => 'S1', // Pendidikan yang sesuai
                'foto' => 'male.jpg', // Nama file foto yang sesuai
                'nama_ayah' => $faker->name('male'),
                'nama_ibu' => $faker->name('female'),
                'status_ayah' => true,
                'status_ibu' => true,
                // 'tlahir_ayah' => 'Tempat Lahir Ayah Calon Pria ' . ($i + 1),
                // 'tlahir_ibu' => 'Tempat Lahir Ibu Calon Pria ' . ($i + 1),
                // 'tgl_lahir_ayah' => '1960-01-01', // Tanggal lahir ayah yang sesuai
                // 'tgl_lahir_ibu' => '1965-01-01', // Tanggal lahir ibu yang sesuai
                // 'pekerjaan_ayah' => 'Pekerjaan Ayah Calon Pria ' . ($i + 1),
                // 'pekerjaan_ibu' => 'Pekerjaan Ibu Calon Pria ' . ($i + 1),
                // 'alamat_ayah' => 'Alamat Ayah Calon Pria ' . ($i + 1),
                // 'alamat_ibu' => 'Alamat Ibu Calon Pria ' . ($i + 1),
            ]);

            $calonWanita = CalonPengantin::create([
                'nama' => $faker->name('female'),
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Morotai',
                'tgl_lahir' => '1992-01-01',
                'umur' => 28,
                'warga_negara' => 'wni',
                'negara_asal' => null,
                'passpor' => null,
                'agama' => 'Islam',
                'status' => 'bk',
                'nohp' => '08123456789',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'email' => $faker->email(),
                'alamat' => 'Muhajirin Baru',
                'pendidikan' => 'S1', // Pendidikan yang sesuai
                'foto' => 'female.jpg', // Nama file foto yang sesuai
                'nama_ayah' => $faker->name('male'),
                'nama_ibu' => $faker->name('female'),
                'status_ayah' => true,
                'status_ibu' => true,
            ]);

            PendaftaranNikah::create([
                'calpen_pria_id' => $calonPria->id,
                'calpen_wanita_id' => $calonWanita->id,
                // 'kode_pendaftar' => 'Kode Pendaftar ' . ($i + 1),
                'tanggal_nikah' => now()->addDays($i), // Tanggal nikah yang berbeda
                'nama_wali' => $faker->name('male'),
                'status_wali' => 'nasab',
                'warga_negara' => 'wni',
                'hubungan_wali' => 'Saudara',
                'nik_nip_wali' => '1234567890', // Nomor NIK/NIP yang sesuai
                'nama_ayah_wali' => $faker->name('male'),
                'pekerjaan_wali' => 'Pegawai Swasta',
                'tmpt_lahir_wali' => 'Morotai',
                'tgl_lahir_wali' => '1970-01-01', // Tanggal lahir wali yang sesuai
                'no_hp' => '08123456789', // Nomor HP yang sesuai
                'agama' => 'Islam',
                'status' => 'belum_diproses',
                'latitude' => '128.40546',
                'longitude' => '2.19924',
                'user_id' => $faker->numberBetween(2, 3)
            ]);
        }

    }
}
