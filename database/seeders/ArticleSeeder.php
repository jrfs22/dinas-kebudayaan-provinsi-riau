<?php

namespace Database\Seeders;

use App\Models\ArticleModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\ArticleCategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (ArticleCategoryModel::all() as $item) {
            $user = User::inRandomOrder()->first();
            ArticleModel::factory()->count(5)->state([
                'category_id' => $item->id,
                'user_id' => $user->id
            ])->create();
        }
    }
}
