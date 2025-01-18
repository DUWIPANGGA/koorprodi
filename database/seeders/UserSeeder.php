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
                'password' => bcrypt('9w3uj0vu3n'),
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
                'password' => bcrypt('89ju498bncv'),
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
                'password' => bcrypt('ijnahdwu9jiwojmf'),
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
                'password' => bcrypt('ineru9wenrwu9'),
            ],
        ];

        foreach ($userData as $user) {
            User::create($user);
        }
    }
}
