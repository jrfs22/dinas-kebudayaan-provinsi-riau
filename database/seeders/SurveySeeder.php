<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SurveyModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::inRandomOrder()->first();
        SurveyModel::factory()->count(10)->state([
            'user_id' => $user->id
        ])->create();
    }
}
