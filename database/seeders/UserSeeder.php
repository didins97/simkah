<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email','didin@app.com')->first();
        if (!$admin) {
            User::create([
                'nama_depan' => 'admin',
                'nama_belakang' => 'super',
                'nohp' => '0855241702298',
                'email' => 'didin@app.com',
                'password' => bcrypt('password123'),
                'level' => 'admin',
            ]);
        }

        $user = User::where('email', 'didinuser@app.com')->first();
        if (!$user) {
            User::create([
                'nama_depan' => 'didin',
                'nama_belakang' => 'sibua',
                'nohp' => '0855241702298',
                'email' => 'didinuser@app.com',
                'nik' => '-',
                'password' => bcrypt('password123'),
                'level' => 'user',
            ]);
        }

        $user2 = User::where('email', 'arhamuser@app.com')->first();
        if (!$user2) {
            User::create([
                'nama_depan' => 'arham',
                'nama_belakang' => 'saputra',
                'nohp' => '0855241702298',
                'email' => 'arhamuser@app.com',
                'nik' => '-',
                'password' => bcrypt('password123'),
                'level' => 'user',
            ]);
        }

        $vendor = User::where('email', 'didinvendor@app.com')->first();
        if (!$vendor) {
            User::create([
                'nama_depan' => 'didin',
                'nama_belakang' => 'sibua',
                'nohp' => '0855241702298',
                'email' => 'didinvendor@app.com',
                'nama_perusahan' => 'didingroup',
                'password' => bcrypt('password123'),
                'level' => 'vendor',
            ]);
        }

        $vendor2 = User::where('email', 'arhamvendor@app.com')->first();
        if (!$vendor2) {
            User::create([
                'nama_depan' => 'arham',
                'nama_belakang' => 'saputra',
                'nohp' => '0855241702298',
                'email' => 'arhamvendor@app.com',
                'nama_perusahan' => 'arhamgroup',
                'password' => bcrypt('password123'),
                'level' => 'vendor',
            ]);
        }
    }
}
