<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AcaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_acara' => $this->faker->words(3, true), // Nama acara dengan 3 kata
            'tanggal' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'), // Tanggal antara sekarang dan 1 tahun ke depan
            'lama_acara' => $this->faker->numberBetween(1, 7), // Lama acara dalam hari (1-7 hari)
            'start' => $this->faker->boolean, // Status dimulai (true/false)
            'user_id' => User::factory(), // Relasi dengan tabel User
        ];
    }
}
