<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PengaduanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Relasi dengan table User
            'cerita' => $this->faker->paragraphs(3, true), // Cerita panjang dalam 3 paragraf
            'validasi' => $this->faker->boolean, // Status validasi (true/false)
        ];
    }
}
