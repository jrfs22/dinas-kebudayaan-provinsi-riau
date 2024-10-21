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
                'title' => 'Visi dan Misi Kebudayaan Melayu',
                'description' => 'Visi dan Misi Dinas Kebudayaan dalam pengembangan budaya Melayu.',
                'content' => '
                    <p>Terwujudnya Dinas Kebudayaan Sebagai Pusat Pelestarian, Pendokumentasian, dan Pengembangan Budaya Melayu guna memperkuat karakter dan jati diri bangsa menuju masyarakat berbudaya dan sejahtera, berbasis teknologi informasi dalam lingkup masyarakat Agamis.</p>
                ',
                'date' => now(),
                'status' => 'published',
                'category' => 'visi',
                'url_path' => 'visi-misi-kebudayaan-melayu',
                'image_path' => 'images/culture-vision.jpg',
            ],
            [
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
            ],
            [
                'title' => 'sejarah',
                'description' => 'Sejarah Singkat',
                'content' => '
                    <p><span style="color: rgb(0, 0, 0); background-color: rgba(255, 255, 255, 0.5);">Dinas Kebudayaan Provinsi Riau sebelumnya tergabung dalam Dinas Pendidikan dan Kebudayaan Provinsi Riau, Namun sejak keluarnya Peraturan Gubernur Riau No 4 tahun 2016 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi, serta Tata Kerja Dinas Kebudayaan Provinsi Riau. Maka Dinas Kebudayaan berpisah dari Dinas Pendidikan dan diberi nama menjadi Dinas Kebudayaan Provinsi Riau</span></p>
                ',
                'date' => now(),
                'status' => 'published',
                'category' => 'sejarah',
                'url_path' => null,
                'image_path' => 'images/director-speech.jpg',
            ],
            [
                'title' => 'Struktur Organisasi',
                'description' => 'Struktur Organisasi',
                'content' => '
                    asdasdsdsd
                ',
                'date' => now(),
                'status' => 'published',
                'category' => 'struktur organisasi',
                'url_path' => null,
                'image_path' => 'images/director-speech.jpg',
            ],
            [
                'title' => 'Telepon',
                'description' => 'Telepon',
                'content' => '0812-3456-7890',
                'date' => now(),
                'status' => 'published',
                'category' => 'telepon',
                'url_path' => 'tel:+0812-3456-7890',
                'image_path' => null,
            ],
            [
                'title' => 'Email',
                'description' => 'Email',
                'content' => 'disbud@gmail.com',
                'date' => now(),
                'status' => 'published',
                'category' => 'email',
                'url_path' => 'mailto:disbud@gmail.com',
                'image_path' => null,
            ],
            [
                'title' => 'Tugas & Fungsi Pokok',
                'description' => 'Tugas & Fungsi Pokok',
                'content' => '<p><span style="background-color: rgba(255, 255, 255, 0.5); color: rgb(0, 0, 0);">Dinas Kebudayaan Merupakan Unsur Pelaksana Urusan Pemerintah yang menjadi kewenangan Daerah.</span></p><p><span style="background-color: rgba(255, 255, 255, 0.5); color: rgb(0, 0, 0);">Dinas Kebudayaan mempunyai tugas membantu Gubernur dalam melaksanakan Urusan Pemerintahan yang menjadi kewenangan Daerah dan Tugas Pembantuan yang ditugaskan kepala Daerah.</span></p><p><br></p><p><span style="background-color: rgba(255, 255, 255, 0.5); color: rgb(0, 0, 0);">Dinas Kebudayaan dalam melaksanakan tugas sebagaimana dimaksud melaksanakan penyelenggaraan fungsi :</span></p><ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span><span style="background-color: rgba(255, 255, 255, 0.5); color: rgb(0, 0, 0);">perumusan kebijakaan pada sekretariat, bidang bahasa dan seni,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;bidang pelestarian adat dan nilai budaya, bidang sejarah,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pelestarian cagar budaya dan permuseuman, dan bidang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rekayasa budaya.</span></li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span><span style="background-color: rgba(255, 255, 255, 0.5); color: rgb(0, 0, 0);">pelaksanaan kebijakan pada sekretariat, bidang bahasa dan seni,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;bidang pelestarian adat dan nilai budaya, bidang sejarah,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pelestarian cagar budaya dan permuseuman, dan bidang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rekayasa budaya.</span></li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span><span style="background-color: rgba(255, 255, 255, 0.5); color: rgb(0, 0, 0);">pelaksanaan evaluasi dan pelaporan pada sekretariat, bidang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;bahasa dan seni, bidang pelestarian adat dan nilai budaya, bidang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sejarah, pelestarian cagar budaya dan permuseuman, dan bidang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rekayasa budaya.</span></li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span><span style="background-color: rgba(255, 255, 255, 0.5); color: rgb(0, 0, 0);">pelaksanaan administrasi pada sekretariat, bidang bahasa dan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;seni, bidang pelestarian adat dan nilai budaya, bidang sejarah,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pelestarian cagar budaya dan permuseuman, dan bidang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rekayasa budaya.</span></li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span><span style="background-color: rgba(255, 255, 255, 0.5); color: rgb(0, 0, 0);">pelaksanaan fungsi lain yang diberikan oleh Gubernur terkait&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dengan tugas dan fungsinya.</span></li></ol>
                ',
                'date' => now(),
                'status' => 'published',
                'category' => 'tugas pokok & fungsi',
                'url_path' => null,
                'image_path' => 'images/director-speech.jpg',
            ],
            [
                'title' => 'Misi Kebudayaan Melayu',
                'description' => 'Misi Dinas Kebudayaan dalam pengembangan budaya Melayu.',
                'content' => '<ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Mewujudkan pelestarian adat, nilai budaya dan masyarakatnya melalui inventarisasi dan pendokumentasian.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Menjadikan Riau sebagai pusat bahasa dan seni budaya Melayu di Asia Tenggara.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Menjadikan diplomasi dan publikasi budaya Melayu berbasis teknologi informasi.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Menjadikan Riau sebagai pusat sejarah, cagar budaya, dan pengembangan permuseuman.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Menjadikan Riau sebagai pengumpul, perawat serta penyaji warisan benda dan takbenda seni budaya Melayu.</li></ol>',
                'date' => now(),
                'status' => 'published',
                'category' => 'misi',
                'url_path' => 'visi-misi-kebudayaan-melayu',
                'image_path' => 'images/culture-vision.jpg',
            ],
            [
                'title' => 'Hero Deskripsi',
                'description' => 'Hero Deskripsi',
                'content' => 'Temukan pesona budaya Melayu Riau yang kaya dengan tradisi dan sejarah. Dari seni hingga adat istiadat, mari kita lestarikan bersama keindahan yang tak lekang oleh waktu.',
                'date' => now(),
                'status' => 'published',
                'category' => 'hero-deskripsi',
                'url_path' => null,
                'image_path' => null,
            ],
            [
                'title' => 'Hero Gambar Utama 261x366',
                'description' => '435x544',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'hero-main-image',
                'url_path' => null,
                'image_path' => 'assets/img/banner-2-img-2.jpg',
            ],
            [
                'title' => 'Hero Gambar Kedua 435x544',
                'description' => '261x366',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'hero-secondary-image',
                'url_path' => null,
                'image_path' => 'assets/img/banner-2-img-1.jpg',
            ],
            [
                'title' => 'Breadcrumb',
                'description' => '1920x599',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'breadcrumb',
                'url_path' => '/',
                'image_path' => 'assets/guest/img/breadcrumb-bg.jpg',
            ],
            [
                'title' => 'Tentang Kami',
                'description' => 'Deskripsi',
                'content' => 'Dinas Kebudayaan Provinsi Riau berkomitmen untuk melestarikan dan mengembangkan kebudayaan Melayu yang kaya. Kami mengajak masyarakat untuk terlibat dalam menjaga tradisi, seni, dan adat istiadat yang merupakan identitas kita bersama.',
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-deskripsi',
                'url_path' => '/',
                'image_path' => null,
            ],
            [
                'title' => 'Tentang Kami Background 1920x812',
                'description' => '1920x812',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-background',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-us-bg.png',
            ],
            [
                'title' => 'Tentang Kami Gambar Utama 412x412',
                'description' => '412x412',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-gambar-utama',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-2-image-1.png',
            ],
            [
                'title' => 'Tentang Kami Thumnail Youtube 276x276',
                'description' => '276x276',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-gambar-thumnail',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-2-image-2.png',
            ],
            [
                'title' => 'Video Youtube Channel',
                'description' => '276x276',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-channel-yt',
                'url_path' => 'https://youtu.be/K88OhAy7x9c',
                'image_path' => null,
            ],
            [
                'title' => 'Sistem Informasi Tanah Riau - Si-Tari',
                'description' => '353x413',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'sitari',
                'url_path' => 'http://sitari.disbud.riau.go.id/',
                'image_path' => 'assets/guest/img/cta-2-img.png',
            ],
            [
                'title' => 'UPT Museum',
                'description' => 'Deskripsi',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-deskripsi',
                'url_path' => null,
                'image_path' => null,
            ],
            [
                'title' => 'UPT Museum Background 1920x812',
                'description' => '1920x812',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-background',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-us-bg.png',
            ],
            [
                'title' => 'UPT Museum Gambar Utama 412x412',
                'description' => '412x412',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-gambar-utama',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-2-image-1.png',
            ],
            [
                'title' => 'UPT Museum Thumnail Youtube 276x276',
                'description' => '276x276',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-gambar-thumnail',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-2-image-2.png',
            ],
            [
                'title' => 'UPT Museum Video Youtube Channel',
                'description' => '276x276',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-channel-yt',
                'url_path' => 'https://youtu.be/K88OhAy7x9c',
                'image_path' => null,
            ],
            [
                'title' => 'Background Footer 1920x515',
                'description' => '1920x515',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'footer-background',
                'url_path' => null,
                'image_path' => 'assets/guest/img/footer-bg.jpg',
            ],
        ]);
    }
}
