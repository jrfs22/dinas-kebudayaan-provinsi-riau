<?php

namespace Database\Seeders;

use App\Models\NewsModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\NewsCategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (NewsCategoryModel::all() as $item) {
            $user = User::inRandomOrder()->first();
            NewsModel::factory()->count(5)->state([
                'category_id' => $item->id,
                'user_id' => $user->id
            ])->create();
        }
    }
}
