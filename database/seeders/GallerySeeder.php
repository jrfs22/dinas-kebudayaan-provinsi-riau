<?php

namespace Database\Seeders;

use App\Models\GalleryCategoryModel;
use App\Models\GalleryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (GalleryCategoryModel::all() as $item) {
            GalleryModel::factory()->count(5)->state([
                'gallery_category_id' => $item->id,
            ])->create();
        }
    }
}
