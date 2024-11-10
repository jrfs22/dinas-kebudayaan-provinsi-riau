<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SurveyModel>
 */
class SurveyModelFactory extends Factory
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
            'url_path' => 'https://docs.google.com/forms/u/0/d/e/1FAIpQLSeu8xQ3vQ3VxFMp-hsVYCQ09tMBg3E7BrTzi9Bpe-SHOo6tjg/formResponse',
            'start_date' => date('Y-m-d H:i:s', fake()->dateTime()->getTimestamp()),
            'end_date' => date('Y-m-d H:i:s', fake()->dateTime()->getTimestamp()),
            'status' => fake()->randomElement(['active', 'inactive', 'completed']),
        ];
    }
}
