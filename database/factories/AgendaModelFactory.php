<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AgendaModel>
 */
class AgendaModelFactory extends Factory
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
            'location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.67732615472!2d101.4547997!3d0.4951528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aedd2565414f%3A0x61f21d93f231fbf!2sDinas%20Kebudayaan%20Riau!5e0!3m2!1sid!2sid!4v1731219798483!5m2!1sid!2sid',
            'start_time' => fake()->time(),
            'end_time' => fake()->time(),
            'cover_image_path' => 'images/agenda/cover/1730911501-672b9d0d9c6a2.jpg',
            'image_path' => 'images/agenda/1730911501-672b9d0d9ea6b.png',
            'date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d')
        ];
    }
}
