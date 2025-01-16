<?php

namespace Database\Seeders;  
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run() : void
    {
        $userData = [
            [
                'name' => 'Admin',
                'NIM' => '0',
                'email' => 'admin@gmail.com',
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
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'mahasiswa@gmail.com',
                'alamat' => 'loh bener',
                'angkatan' => '2024',
                'semester'=>'0',
                'phone'=>'0',
                'role' => 'user',
                'password' => bcrypt('123456'),
            ], 
            [
                'name' => 'Reviewer',
                'NIM' => '2305062',
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'reviewer@gmail.com',
                'role' => 'admin',
                'alamat' => 'loh bener',
                'angkatan' => '2024',
                'semester'=>'0',
                'phone'=>'0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Kominfo',
                'NIM' => '9999999',
                'email_verified_at' => now(),
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'kominfo@gmail.com',
                'role' => 'admin',
                'alamat' => 'arab',
                'semester'=>'0',
                'angkatan' => '2024',
                'phone'=>'0',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($userData as $user) {
            User::create($user);
        }
    }
}
