<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence, // Judul artikel acak
            'content' => $this->faker->paragraphs(5, true), // Konten artikel dalam 5 paragraf
            'picture_article' => $this->faker->imageUrl(640, 480, 'articles', true, 'Faker'), // URL gambar acak
            'user_id' => User::factory(), // Relasi dengan tabel User
        ];
    }
}
