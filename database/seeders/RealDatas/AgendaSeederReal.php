<?php

namespace Database\Seeders\RealDatas;

use App\Models\AgendaModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgendaSeederReal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::inRandomOrder()->first();

        AgendaModel::insert(
            [
                // Category: Festival (id=1)
                [
                    'title' => 'Festival Budaya Melayu',
                    'slug' => '123/festival-budaya-melayu',
                    'summary' => 'Acara festival budaya untuk memperkenalkan kesenian Melayu.',
                    'content' => 'Festival Budaya Melayu ini diadakan sebagai bentuk apresiasi terhadap budaya Melayu yang kaya dan beragam. Acara ini akan menampilkan pertunjukan seni tari, musik tradisional, serta berbagai macam makanan khas Melayu. Pengunjung juga dapat berpartisipasi dalam berbagai workshop seperti membuat kain songket dan belajar alat musik tradisional. Selain itu, terdapat bazar yang menawarkan berbagai produk lokal yang dihasilkan oleh para pengrajin Melayu.',
                    'location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.67732615472!2d101.4547997!3d0.4951528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aedd2565414f%3A0x61f21d93f231fbf!2sDinas%20Kebudayaan%20Riau!5e0!3m2!1sen!2sid!4v1731538785117!5m2!1sen!2sid',
                    'start_time' => '09:00',
                    'end_time' => '22:00',
                    'cover_image_path' => 'images/agenda/cover/festival_budaya_melayu.jpg',
                    'image_path' => 'images/agenda/festival_budaya_melayu.jpg',
                    'date' => '2024-06-10',
                    'agenda_category_id' => 1,
                    'user_id' => $user->id
                ],
                [
                    'title' => 'Festival Seni dan Musik Riau',
                    'slug' => '123/festival-seni-musik-riau',
                    'summary' => 'Menampilkan karya seni dan pertunjukan musik khas Riau.',
                    'content' => 'Festival Seni dan Musik Riau bertujuan untuk melestarikan dan mempromosikan seni dan budaya Riau kepada masyarakat luas. Dalam acara ini, pengunjung dapat menikmati berbagai pameran seni yang menampilkan lukisan, patung, dan karya seni visual lainnya dari seniman lokal. Pertunjukan musik tradisional dan modern juga akan disajikan sepanjang acara. Selain itu, tersedia ruang interaktif bagi anak-anak dan remaja untuk mengenal seni dan budaya melalui kegiatan workshop.',
                    'location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.67732615472!2d101.4547997!3d0.4951528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aedd2565414f%3A0x61f21d93f231fbf!2sDinas%20Kebudayaan%20Riau!5e0!3m2!1sen!2sid!4v1731538785117!5m2!1sen!2sid',
                    'start_time' => '10:00',
                    'end_time' => '21:00',
                    'cover_image_path' => 'images/agenda/cover/festival_seni_musik.png',
                    'image_path' => 'images/agenda/festival_seni_musik.png',
                    'date' => '2024-07-15',
                    'agenda_category_id' => 1,
                    'user_id' => $user->id
                ],

                // Category: Museum (id=2)
                [
                    'title' => 'Pameran Sejarah Perjuangan Riau',
                    'slug' => '123/pameran-sejarah-perjuangan-riau',
                    'summary' => 'Pameran yang mengangkat kisah perjuangan masyarakat Riau.',
                    'content' => 'Pameran Sejarah Perjuangan Riau menampilkan artefak dan foto-foto bersejarah yang menggambarkan kisah perjuangan rakyat Riau dalam meraih kemerdekaan. Pameran ini juga dilengkapi dengan narasi interaktif yang menceritakan kontribusi tokoh-tokoh lokal dalam upaya memerdekakan Indonesia. Selain itu, pengunjung dapat menyaksikan film dokumenter pendek mengenai sejarah Riau dan mengunjungi ruangan khusus yang menampilkan memorabilia dan benda-benda unik dari masa perjuangan.',
                    'location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.67732615472!2d101.4547997!3d0.4951528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aedd2565414f%3A0x61f21d93f231fbf!2sDinas%20Kebudayaan%20Riau!5e0!3m2!1sen!2sid!4v1731538785117!5m2!1sen!2sid',
                    'start_time' => '09:00',
                    'end_time' => '17:00',
                    'cover_image_path' => 'images/agenda/cover/pameran_sejarah.webp',
                    'image_path' => 'images/agenda/pameran_sejarah.webp',
                    'date' => '2024-09-05',
                    'agenda_category_id' => 2,
                    'user_id' => $user->id
                ],
                [
                    'title' => 'Pameran Koleksi Etnografi Riau',
                    'slug' => '123/pameran-koleksi-etnografi-riau',
                    'summary' => 'Pameran koleksi etnografi yang menggambarkan kehidupan masyarakat Riau.',
                    'content' => 'Pameran Koleksi Etnografi Riau memperlihatkan benda-benda tradisional yang digunakan dalam kehidupan sehari-hari masyarakat Melayu Riau. Benda-benda seperti peralatan rumah tangga, pakaian adat, dan alat musik ditampilkan dengan penjelasan mengenai fungsinya dalam kehidupan masyarakat dahulu kala. Pengunjung juga dapat menyaksikan demonstrasi pembuatan anyaman dan kerajinan tangan lainnya yang sudah jarang ditemui saat ini.',
                    'location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.67732615472!2d101.4547997!3d0.4951528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aedd2565414f%3A0x61f21d93f231fbf!2sDinas%20Kebudayaan%20Riau!5e0!3m2!1sen!2sid!4v1731538785117!5m2!1sen!2sid',
                    'start_time' => '08:30',
                    'end_time' => '16:30',
                    'cover_image_path' => 'images/agenda/cover/etnografi.jpg',
                    'image_path' => 'images/agenda/etnografi.jpg',
                    'date' => '2024-10-10',
                    'agenda_category_id' => 2,
                    'user_id' => $user->id
                ],

                // Category: Diplomasi & Promosi Budaya (id=3)
                [
                    'title' => 'Diplomasi Budaya ke Malaysia',
                    'slug' => '123/diplomasi-budaya-malaysia',
                    'summary' => 'Kegiatan promosi budaya Melayu Riau di Malaysia.',
                    'content' => 'Diplomasi Budaya ke Malaysia merupakan upaya mempererat hubungan budaya antara Indonesia dan Malaysia. Acara ini akan menampilkan pertunjukan seni seperti tari Melayu dan musik tradisional Riau. Selain itu, terdapat sesi dialog budaya yang dihadiri oleh budayawan dari kedua negara untuk membahas kesamaan dan keunikan budaya Melayu. Acara ini diharapkan dapat memperkuat kerja sama budaya di masa mendatang.',
                    'location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.67732615472!2d101.4547997!3d0.4951528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aedd2565414f%3A0x61f21d93f231fbf!2sDinas%20Kebudayaan%20Riau!5e0!3m2!1sen!2sid!4v1731538785117!5m2!1sen!2sid',
                    'start_time' => '09:00',
                    'end_time' => '21:00',
                    'cover_image_path' => 'images/agenda/cover/diplomasi_malaysia.jpg',
                    'image_path' => 'images/agenda/diplomasi_malaysia.jpg',
                    'date' => '2024-11-05',
                    'agenda_category_id' => 3,
                    'user_id' => $user->id
                ],
            ]
        );

    }
}
