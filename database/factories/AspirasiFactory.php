<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AspirasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ip_address' => $this->faker->ipv4, // Alamat IP acak
            'nama' => $this->faker->name, // Nama pengirim aspirasi
            'isi' => $this->faker->paragraphs(3, true), // Isi aspirasi dalam 3 paragraf
        ];
    }
}