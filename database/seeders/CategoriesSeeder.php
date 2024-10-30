<?php

namespace Database\Seeders;

use App\Models\GalleryCategoryModel;
use App\Models\NewsCategoryModel;
use Illuminate\Database\Seeder;
use App\Models\AgendaCategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AgendaCategoryModel::insert([
            [
                'name' => 'Festival',
            ],
            [
                'name' => 'Museum',
            ],
        ]);

        NewsCategoryModel::create([
            'name' => 'UPT Museum'
        ]);

        GalleryCategoryModel::create([
            'name' => 'UPT Museum'
        ]);
    }
}
