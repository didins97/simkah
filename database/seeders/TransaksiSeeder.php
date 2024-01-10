<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $vendor1 = User::where('email', 'didinvendor@app.com')->first();
        $vendor2 = User::where('email', 'arhamvendor@app.com')->first();

        $user1 = User::where('email', 'didinuser@app.com')->first();
        $user2 = User::where('email', 'arhamuser@app.com')->first();

        // $layananVendor1 = $vendor1->vendor->where('status', 'disetujui')->get();
        // $layananVendor2 = $vendor2->vendor->where('status', 'disetujui')->get();

        $layananVendor1 = Vendor::where('user_id', $vendor1->id)->where('status', 'disetujui')->get();
        $layananVendor2 = Vendor::where('user_id', $vendor2->id)->where('status', 'disetujui')->get();

        // dd($faker->paragraphs());


        foreach ($layananVendor1 as $lv) {
            Transaksi::create([
                'invoice' => $faker->numerify('INV-####'),
                'keterangan' => 'Transaksi Menunggu Pembayaran',
                'alamat' => $faker->text(),
                'nohp' => '08xxxxxxxxx',
                'email_penerima' => 'parto@app.com',
                'nama_penerima' => 'Parto',
                'user_id' => $user2->id,
                'vendor_id' => $lv->id,
                'status' => 'menunggu_pembayaran',
                'tanggal_acara' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years'),
                'keterangan' => $faker->text(),
                'latitude' => '123.456',
                'longitude' => '456.789',
            ]);
        }

        foreach ($layananVendor2 as $lv) {
            Transaksi::create([
                'invoice' => $faker->numerify('INV-####'),
                'keterangan' => 'Transaksi Menunggu Pembayaran',
                'alamat' => $faker->text(),
                'nohp' => '08xxxxxxxxx',
                'email_penerima' => 'uni@app.com',
                'nama_penerima' => 'Sri Wayhuni',
                'user_id' => $user1->id,
                'vendor_id' => $lv->id,
                'status' => 'menunggu_pembayaran',
                'tanggal_acara' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years'),
                'keterangan' => $faker->text(),
                'latitude' => '123.456',
                'longitude' => '456.789',
            ]);
        }
    }
}
