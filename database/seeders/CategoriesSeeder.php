<?php

namespace Database\Seeders;

use App\Models\ArticleCategoryModel;
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
                'departement_id' => 2
            ],
            [
                'name' => 'Museum',
                'departement_id' => 2
            ],
            [
                'name' => 'Diplomasi & Promosi Budaya',
                'departement_id' => 3
            ],
        ]);

        NewsCategoryModel::insert([
            [
                'name' => 'Museum',
                'departement_id' => 2
            ],
            [
                'name' => 'Diplomasi & Promosi Budaya',
                'departement_id' => 3
            ],
            [
                'name' => 'Pelestarian Adat & Nilai Budaya',
                'departement_id' => 4
            ],
        ]);

        GalleryCategoryModel::insert([
            [
                'name' => 'Museum',
                'departement_id' => 2
            ],
            [
                'name' => 'Diplomasi & Promosi Budaya',
                'departement_id' => 3
            ],
            [
                'name' => 'Pelestarian Adat & Nilai Budaya',
                'departement_id' => 4
            ],
        ]);

        ArticleCategoryModel::insert([
            [
                'name' => 'Museum',
                'departement_id' => 2
            ],
            [
                'name' => 'Diplomasi & Promosi Budaya',
                'departement_id' => 3
            ],
            [
                'name' => 'Pelestarian Adat & Nilai Budaya',
                'departement_id' => 4
            ],
        ]);
    }
}
