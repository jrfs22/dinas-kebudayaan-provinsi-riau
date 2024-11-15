<?php

namespace Database\Seeders\RealDatas;

use App\Models\GalleryModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GallerySeederReal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        GalleryModel::insert(
            [
                // Category: Festival (id=1)
                [
                    'title' => 'Galeri Festival Budaya Melayu',
                    'slug' => '123/galeri-festival-budaya-melayu',
                    'date' => '2024-06-10',
                    'image_path' => 'images/news/festival_budaya_melayu.jpg',
                    'gallery_category_id' => 1,
                ],
                [
                    'title' => 'Galeri Pesta Seni Riau',
                    'slug' => '123/galeri-pesta-seni-riau',
                    'date' => '2024-07-20',
                    'image_path' => 'images/news/festival_seni_musik.png',
                    'gallery_category_id' => 1,
                ],

                // Category: Museum (id=2)
                [
                    'title' => 'Galeri Pameran Sejarah Riau',
                    'slug' => '123/galeri-pameran-sejarah-riau',
                    'date' => '2024-08-15',
                    'image_path' => 'images/news/pameran_sejarah.webp',
                    'gallery_category_id' => 2,
                ],
                [
                    'title' => 'Galeri Pameran Etnografi Nusantara',
                    'slug' => '123/galeri-pameran-etnografi-nusantara',
                    'date' => '2024-09-05',
                    'image_path' => 'images/news/etnografi.jpg',
                    'gallery_category_id' => 2,
                ],

                // Category: Diplomasi & Promosi Budaya (id=3)
                [
                    'title' => 'Galeri Promosi Budaya Melayu ke Malaysia',
                    'slug' => '123/galeri-promosi-budaya-melayu-malaysia',
                    'date' => '2024-10-15',
                    'image_path' => 'images/news/diplomasi_malaysia.jpg',
                    'gallery_category_id' => 3,
                ],
            ]
        );

    }
}
