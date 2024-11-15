<?php

namespace Database\Seeders\RealDatas;

use App\Models\User;
use App\Models\ArticleModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeederReal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::inRandomOrder()->first();

        ArticleModel::insert(
            [
                // Category: Festival (id=1)
                [
                    'title' => 'Festival Budaya Riau Meriahkan Tahun Ini',
                    'content' => 'Festival Budaya Riau menghadirkan rangkaian acara seni dan budaya yang menampilkan tari tradisional, musik, hingga pameran kerajinan lokal. Acara ini bertujuan untuk mempromosikan kekayaan budaya Riau kepada masyarakat luas.',
                    'slug' => '1234/festival-budaya-riau-meriahkan-tahun-ini',
                    'summary' => 'Festival tahunan yang menampilkan keindahan seni dan budaya khas Riau.',
                    'date' => '2024-06-15',
                    'cover_image_path' => 'images/article/cover/festival_budaya_melayu.jpg',
                    'image_path' => 'images/article/festival_budaya_melayu.jpg',
                    'user_id' => $user->id,
                    'category_id' => 1,
                    'hashtags' => json_encode('s')
                ],
                [
                    'title' => 'Pesta Seni Riau 2024 Menggali Potensi Lokal',
                    'content' => 'Pesta Seni Riau 2024 mempersembahkan berbagai karya seni dari seniman lokal, mulai dari lukisan, patung, hingga pertunjukan tari. Acara ini merupakan ajang apresiasi untuk mengangkat potensi seni daerah dan memberikan ruang bagi seniman lokal untuk menunjukkan karyanya.',
                    'slug' => '1234/pesta-seni-riau-2024-menggali-potensi-lokal',
                    'summary' => 'Ajang apresiasi seni yang melibatkan seniman-seniman berbakat dari Riau.',
                    'date' => '2024-07-10',
                    'cover_image_path' => 'images/article/cover/festival_seni_musik.png',
                    'image_path' => 'images/article/festival_seni_musik.png',
                    'user_id' => $user->id,
                    'category_id' => 1,
                    'hashtags' => json_encode('s')
                ],

                // Category: Museum (id=2)
                [
                    'title' => 'Pameran Sejarah Riau: Mengenal Jati Diri Nusantara',
                    'content' => 'Pameran Sejarah Riau menampilkan artefak dan cerita sejarah Riau yang mengungkap perjalanan masyarakat dalam menjaga budaya dan kedaulatan wilayah. Melalui pameran ini, pengunjung dapat lebih memahami latar belakang sejarah Riau dan peranannya dalam sejarah Indonesia.',
                    'slug' => '1234/pameran-sejarah-riau-mengenal-jati-diri-nusantara',
                    'summary' => 'Eksplorasi mendalam tentang sejarah dan budaya Riau melalui pameran.',
                    'date' => '2024-08-05',
                    'cover_image_path' => 'images/article/cover/pameran_sejarah.webp',
                    'image_path' => 'images/article/pameran_sejarah.webp',
                    'user_id' => $user->id,
                    'category_id' => 2,
                    'hashtags' => json_encode('s')
                ],
                [
                    'title' => 'Pameran Koleksi Etnografi Riau di Museum Daerah',
                    'content' => 'Museum Daerah Riau menyajikan pameran koleksi etnografi yang menggambarkan kehidupan dan kebudayaan masyarakat Riau pada masa lampau. Pengunjung dapat melihat berbagai alat, pakaian, dan benda adat yang menjadi saksi kehidupan sehari-hari nenek moyang Riau.',
                    'slug' => '1234/pameran-koleksi-etnografi-riau',
                    'summary' => 'Koleksi etnografi yang menampilkan kehidupan masyarakat tradisional Riau.',
                    'date' => '2024-09-20',
                    'cover_image_path' => 'images/article/cover/etnografi.jpg',
                    'image_path' => 'images/article/etnografi.jpg',
                    'user_id' => $user->id,
                    'category_id' => 2,
                    'hashtags' => json_encode('s')
                ],

                // Category: Diplomasi & Promosi Budaya (id=3)
                [
                    'title' => 'Diplomasi Budaya Riau di Malaysia',
                    'content' => 'Dalam rangka memperkenalkan budaya Melayu Riau, delegasi budaya dari Riau melakukan kunjungan diplomasi ke Malaysia. Berbagai kegiatan, seperti pameran, pertunjukan seni, dan dialog budaya, dilakukan untuk memperkuat hubungan antarnegara melalui kebudayaan.',
                    'slug' => '1234/diplomasi-budaya-riau-di-malaysia',
                    'summary' => 'Kunjungan diplomasi budaya dari Riau ke Malaysia untuk memperkenalkan budaya Melayu.',
                    'date' => '2024-10-15',
                    'cover_image_path' => 'images/article/cover/diplomasi_malaysia.jpg',
                    'image_path' => 'images/article/diplomasi_malaysia.jpg',
                    'user_id' => $user->id,
                    'category_id' => 3,
                    'hashtags' => json_encode('s')
                ],
            ]
        );

    }
}
