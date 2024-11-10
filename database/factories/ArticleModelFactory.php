<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleModel>
 */
class ArticleModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'summary' => fake()->text(100),
            'content' => fake()->text(500),
            'cover_image_path' => 'images/article/cover/1730865892-672aeae4c43d8.jpg',
            'image_path' => 'images/article/1730865892-672aeae4c2823.png',
            'date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'hashtags' => json_encode('s')
        ];
    }
}
