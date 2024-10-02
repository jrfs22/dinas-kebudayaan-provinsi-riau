<?php

namespace Database\Seeders;

use App\Models\ContentModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContentModel::insert([
            [
                'id' => 1,
                'title' => 'Visi dan Misi Kebudayaan Melayu',
                'description' => 'Visi dan Misi Dinas Kebudayaan dalam pengembangan budaya Melayu.',
                'content' => '
                    <p><strong>VISI</strong></p>
                    <p>Terwujudnya Dinas Kebudayaan Sebagai Pusat Pelestarian, Pendokumentasian, dan Pengembangan Budaya Melayu guna memperkuat karakter dan jati diri bangsa menuju masyarakat berbudaya dan sejahtera, berbasis teknologi informasi dalam lingkup masyarakat Agamis.</p>

                    <p><strong>MISI</strong></p>
                    <ul>
                        <li>Mewujudkan pelestarian adat, nilai budaya dan masyarakatnya melalui inventarisasi dan pendokumentasian.</li>
                        <li>Menjadikan Riau sebagai pusat bahasa dan seni budaya Melayu di Asia Tenggara.</li>
                        <li>Menjadikan diplomasi dan publikasi budaya Melayu berbasis teknologi informasi.</li>
                        <li>Menjadikan Riau sebagai pusat sejarah, cagar budaya, dan pengembangan permuseuman.</li>
                        <li>Menjadikan Riau sebagai pengumpul, perawat serta penyaji warisan benda dan takbenda seni budaya Melayu.</li>
                    </ul>
                ',
                'date' => now(),
                'status' => 'published',
                'category' => 'visi & misi',
                'url_path' => 'visi-misi-kebudayaan-melayu',
                'image_path' => 'images/culture-vision.jpg',
            ],
            [
                'id' => 2,
                'title' => 'Kata Sambutan Direktur',
                'description' => 'Kata sambutan dari Direktur.',
                'content' => '
                    <p><strong>Assalamu\'alaikum Warahmatullahi Wabarakatuh,</strong></p>
                    <p>Puji syukur ke hadirat Allah SWT, kita dapat berkumpul dalam acara ini. Saya sangat menghargai kerja keras seluruh tim yang telah membantu perusahaan mencapai kemajuan ini. Inovasi dan kerja sama selalu menjadi nilai utama yang kita pegang, dan bersama-sama kita akan meraih lebih banyak kesuksesan di masa mendatang.</p>
                    <p>Terima kasih atas kontribusi Anda semua. Semoga apa yang kita lakukan hari ini membawa kebaikan dan manfaat bagi kita semua.</p>
                    <p><strong>Wassalamu\'alaikum Warahmatullahi Wabarakatuh.</strong></p>
                    <p><strong>[Nama Direktur]</strong><br>Direktur [Nama Perusahaan]</p>
                ',
                'date' => now(),
                'status' => 'published',
                'category' => 'sambutan',
                'url_path' => null,
                'image_path' => 'images/director-speech.jpg',
            ]
        ]);
    }
}
