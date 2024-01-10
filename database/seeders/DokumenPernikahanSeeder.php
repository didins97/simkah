<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenPernikahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('dokumen_pernikahan')->count() > 0) {
            DB::table('dokumen_pernikahan')->delete();
            // DB::statement('ALTER TABLE dokumen_pernikahan AUTO_INCREMENT = 1');

        }

        DB::table('dokumen_pernikahan')->insert([
            // ['nama' => 'surat keterangan nikah', 'kode' => 'SKN'],
            // ['nama' => 'persetujuan calon mempelai', 'kode' => 'PCM'],
            // ['nama' => 'fotokopi akta kelahiran', 'kode' => 'FAKL'],
            // ['nama' => 'fotokopi ktp', 'kode' => 'FAKT'],
            // ['nama' => 'fotokopi kk', 'kode' => 'FAKK'],
            // ['nama' => 'pasfoto 2x3', 'kode' => 'PAS23'],
            // ['nama' => 'pasfoto 4x6', 'kode' => 'PAS46'],
            // ['nama' => 'surat izin orang tua', 'kode' => 'SIOT'],
            ['nama' => 'surat dispensasi dibawah umur', 'kode' => 'SDDU'],
            ['nama' => 'surat akta cerai', 'kode' => 'SAC'],
            ['nama' => 'surat izin komandan', 'kode' => 'SIC'],
            ['nama' => 'surat akta kematian', 'kode' => 'SAK'],
            ['nama' => 'surat izin kedutaan', 'kode' => 'SIK'],
            ['nama' => 'surat rekomendasi nikah', 'kode' => 'SRN'],
        ]);
    }
}
