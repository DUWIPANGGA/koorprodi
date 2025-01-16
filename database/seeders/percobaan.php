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
                'name' => 'Admin',
                'NIM' => '00',
                'email' => 'admin@gmail.com',
                'semester' => 0,

                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'alamat' => 'loh bener',
                'role' => 'super_admin',
                'angkatan' => '2024',
'phone'=>'0',
                'password' => bcrypt('123456'),
            ], 
            [
                'name' => 'Mahasiswa',
                'NIM' => '2305063',
                'semester' => 0,
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'mahasiswa@gmail.com',
                'alamat' => 'loh bener',
                'angkatan' => '2024',
                'phone'=>'0',
                'role' => 'user',
                'password' => bcrypt('123456'),
            ], 
            [
                'name' => 'Reviewer',
                'NIM' => '2305062',
                'semester' => 0,
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'reviewer@gmail.com',
                'role' => 'admin',
                'alamat' => 'loh bener',
                'angkatan' => '2024',
                'phone'=>'0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Kominfo',
                'NIM' => '9999999',
                'semester' => 0,
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'kominfo@gmail.com',
                'role' => 'admin',
                'alamat' => 'arab',
                'angkatan' => '2024',
                'phone'=>'0',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($userData as $user) {
            User::create($user);
        }
        User::factory(30)->create()->each(function ($user) {
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
