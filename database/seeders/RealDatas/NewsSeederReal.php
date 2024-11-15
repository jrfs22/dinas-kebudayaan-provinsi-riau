<?php

namespace Database\Seeders\RealDatas;

use App\Models\User;
use App\Models\NewsModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeederReal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::inRandomOrder()->first();

        NewsModel::insert(
            [
                // Category: Festival (id=1)
                [
                    'title' => 'Festival Budaya Melayu',
                    'content' => 'Festival ini diadakan untuk memperkenalkan dan melestarikan budaya Melayu kepada generasi muda. Dalam acara ini terdapat berbagai pertunjukan seni seperti tari Melayu, musik tradisional, serta pameran makanan khas Melayu.',
                    'slug' => '123/festival-budaya-melayu',
                    'summary' => 'Festival budaya tahunan untuk merayakan dan mempromosikan budaya Melayu.',
                    'date' => '2024-06-10',
                    'cover_image_path' => 'images/news/cover/festival_budaya_melayu.jpg',
                    'image_path' => 'images/news/festival_budaya_melayu.jpg',
                    'user_id' => $user->id,
                    'category_id' => 1,
                    'hashtags' => json_encode('s')
                ],
                [
                    'title' => 'Pesta Seni Riau',
                    'content' => 'Pesta Seni Riau menghadirkan berbagai karya seni tradisional dan modern yang dipersembahkan oleh seniman-seniman lokal. Acara ini juga menjadi ajang pertemuan komunitas seni untuk berbagi pengetahuan dan pengalaman.',
                    'slug' => '123/pesta-seni-riau',
                    'summary' => 'Pesta seni tahunan yang menampilkan berbagai karya seni dan budaya Riau.',
                    'date' => '2024-07-20',
                    'cover_image_path' => 'images/news/cover/festival_seni_musik.png',
                    'image_path' => 'images/news/festival_seni_musik.png',
                    'user_id' => $user->id,
                    'category_id' => 1,
                    'hashtags' => json_encode('s')
                ],

                // Category: Museum (id=2)
                [
                    'title' => 'Pameran Koleksi Sejarah Riau',
                    'content' => 'Pameran ini menampilkan koleksi artefak bersejarah yang menceritakan perjalanan masyarakat Riau dalam mempertahankan budaya dan identitas mereka.',
                    'slug' => '123/pameran-koleksi-sejarah-riau',
                    'summary' => 'Pameran artefak sejarah Riau yang sarat makna.',
                    'date' => '2024-08-15',
                    'cover_image_path' => 'images/news/cover/pameran_sejarah.webp',
                    'image_path' => 'images/news/pameran_sejarah.webp',
                    'user_id' => $user->id,
                    'category_id' => 2,
                    'hashtags' => json_encode('s')
                ],
                [
                    'title' => 'Pameran Etnografi Nusantara',
                    'content' => 'Pameran ini berfokus pada pengenalan etnografi dan budaya suku-suku yang ada di Riau dan sekitarnya. Berbagai benda bersejarah dan alat-alat tradisional dipamerkan untuk umum.',
                    'slug' => '123/pameran-etnografi-nusantara',
                    'summary' => 'Pameran etnografi dan budaya suku-suku Riau dan Nusantara.',
                    'date' => '2024-09-05',
                    'cover_image_path' => 'images/news/cover/etnografi.jpg',
                    'image_path' => 'images/news/etnografi.jpg',
                    'user_id' => $user->id,
                    'category_id' => 2,
                    'hashtags' => json_encode('s')
                ],

                // Category: Diplomasi & Promosi Budaya (id=3)
                [
                    'title' => 'Promosi Budaya Melayu ke Malaysia',
                    'content' => 'Sebagai bagian dari diplomasi budaya, kegiatan ini bertujuan memperkenalkan budaya Melayu ke Malaysia melalui pertunjukan seni, pameran, dan interaksi antarbudaya.',
                    'slug' => '123/promosi-budaya-melayu-malaysia',
                    'summary' => 'Promosi budaya Melayu Riau ke negara tetangga, Malaysia.',
                    'date' => '2024-10-15',
                    'cover_image_path' => 'images/news/cover/diplomasi_malaysia.jpg',
                    'image_path' => 'images/news/diplomasi_malaysia.jpg',
                    'user_id' => $user->id,
                    'category_id' => 3,
                    'hashtags' => json_encode('s')
                ],
            ]
        );

    }
}
