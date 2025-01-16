<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(5),
            'nim' => $this->faker->unique()->numerify('2#####'),
            'name' => $this->faker->name,
            'semester' => $this->faker->numberBetween(1, 8),
            'prodi' => $this->faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro']),
            'alamat' => $this->faker->optional()->address,
            'asal_sekolah' => $this->faker->optional()->company . ' High School',
            'hobi' => $this->faker->optional()->randomElement(['Membaca', 'Bermain Musik', 'Olahraga', 'Menulis']),
            'bakat' => $this->faker->optional()->randomElement(['Programming', 'Desain Grafis', 'Public Speaking', 'Mekanika']),
            'foto_profil' => $this->faker->optional()->imageUrl(),
            'kelas' => $this->faker->optional()->randomElement(['A', 'B', 'C', 'D']),
            'angkatan' => $this->faker->optional()->year,
            'gender' => $this->faker->randomElement(['P', 'none', 'L']),
            'phone' => $this->faker->optional()->numerify('###########'),
            'phone_wali' => $this->faker->optional()->numerify('###########'),
            'email' => $this->faker->unique()->safeEmail,
            'bio' => $this->faker->optional()->text,
            'diawasi' => $this->faker->boolean,
            'pelaporan_ipk' => $this->faker->boolean,
            'penerima_kipk' => $this->faker->boolean,
            'status_pengawasan' => $this->faker->randomElement(['0', '1', '2', '3']),
            'status_keanggotaan' => $this->faker->randomElement(['anggota_aktif', 'pengurus', 'alumni', 'demisioner', 'ketua_umum']),
            'email_verified_at' => $this->faker->optional()->dateTime,
            'password' => Hash::make('password'), // Default password
            'role' => $this->faker->randomElement(['bph', 'admin', 'user', 'super_admin', 'koordinator RPL', 'koordinator TI', 'koordinator SIKC', 'koordinator KP', 'koordinator TM', 'koordinator PM', 'koordinator TP', 'koordinator TRIK', 'KOMINFO']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the user should have an admin role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'admin',
            ];
        });
    }
}
