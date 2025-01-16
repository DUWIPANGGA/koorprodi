<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class RekapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IPK' => $this->faker->randomFloat(2, 2.0, 4.0), // Nilai antara 2.0 sampai 4.0
            'dokumen' => $this->faker->filePath(), // Random path untuk dokumen
            'semester' => $this->faker->numberBetween(1, 8), // Semester 1 hingga 8
            'kesulitan' => $this->faker->sentence, // Deskripsi kesulitan
            'validated' => $this->faker->boolean, // Status validasi
            'user_id' => User::factory(), // Relasi dengan table User
        ];
    }
}