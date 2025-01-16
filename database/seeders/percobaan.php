<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Acara;
use App\Models\Rekap;
use App\Models\Aspirasi;
use App\Models\Pengaduan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\Article;
use App\Models\article as ModelsArticle;

class percobaan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'superadmin',
                'NIM' => '0',
                'email' => 'superadmin@gmail.com',
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'alamat' => 'loh bener',
                'role' => 'super_admin',
                'angkatan' => '2024',
                'semester'=>'0',
                'phone'=>'0',
                'password' => bcrypt('123456'),
            ], 
            [
                'name' => 'admin',
                'NIM' => '1',
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'admin@gmail.com',
                'alamat' => 'loh bener',
                'angkatan' => '2024',
                'semester'=>'0',
                'phone'=>'0',
                'role' => 'admin',
                'password' => bcrypt('3283478923'),
            ], 
            [
                'name' => 'user',
                'NIM' => '2',
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'alamat' => 'loh bener',
                'angkatan' => '2024',
                'semester'=>'0',
                'phone'=>'0',
                'password' => bcrypt('09834508304'),
            ],
            [
                'name' => 'Kominfo',
                'NIM' => '3',
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'kominfo@gmail.com',
                'role' => 'admin',
                'alamat' => 'arab',
                'semester'=>'0',
                'angkatan' => '2024',
                'phone'=>'0',
                'password' => bcrypt('384759348'),
            ],
        ];

        foreach ($userData as $user) {
            User::create($user);
        }
        User::factory(100)->create()->each(function ($user) {
            Rekap::factory(3)->create(['user_id' => $user->id]);
            Pengaduan::factory(2)->create(['user_id' => $user->id]);
            ModelsArticle::factory(1)->create(['user_id' => $user->id]);
        });

        // Membuat 5 acara terkait user secara acak
        Acara::factory(5)->create();

        // Membuat 10 aspirasi tanpa relasi ke user
        Aspirasi::factory(10)->create();
    }
}
