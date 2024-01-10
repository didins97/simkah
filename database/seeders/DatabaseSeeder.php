<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(DokumenPernikahanSeeder::class);
        // $this->call(VendorSeeder::class);
        // $this->call(TransaksiSeeder::class);
        $this->call(KecamatanSeeder::class);
        // $this->call(KuaSeeder::class);
        $this->call(PendaftaranPernikahanSeeder::class);
    }
}
