<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsModel>
 */
class NewsModelFactory extends Factory
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
            'cover_image_path' => 'images/news/cover/1730866002-672aeb52ae1a6.jpg',
            'image_path' => 'images/news/1730866002-672aeb52ac56a.jpg',
            'date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'hashtags' => json_encode('s')
        ];
    }
}
