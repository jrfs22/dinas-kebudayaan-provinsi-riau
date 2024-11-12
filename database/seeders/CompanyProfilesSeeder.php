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
                'dimension' => null
            ],
            [
                'title' => 'Kata Sambutan Direktur',
                'description' => 'Kata sambutan dari Direktur.',
                'content' => '
                    <p><strong style="background-color: rgb(250, 249, 246);">Assalamu’alaikum warahmatullahi wabarakatuh. </strong></p><p><span style="background-color: rgb(250, 249, 246);">Selamat datang di website kebudayaan kami! Kami sangat senang Anda bergabung untuk menjelajahi kekayaan budaya yang ada di sekitar kita. Website ini dirancang sebagai sumber informasi menarik tentang seni, tradisi, dan sejarah yang membentuk identitas kita. Semoga platform ini memfasilitasi pertukaran ide dan memperkuat rasa cinta terhadap kebudayaan kita. Terima kasih atas kehadiran Anda, dan selamat menjelajahi! Wassalamu’alaikum warahmatullahi wabarakatuh.</span></p>
                ',
                'date' => now(),
                'status' => 'published',
                'category' => 'sambutan',
                'url_path' => null,
                'image_path' => 'images/director-speech.jpg',
                'dimension' => null
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
                'dimension' => null
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
                'dimension' => null
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
                'dimension' => null
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
                'dimension' => null
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
                'dimension' => null
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
                'dimension' => null
            ],
            [
                'title' => 'Hero Title',
                'description' => null,
                'content' => 'Nikmati Ragam<span class="font-bold"><span
                                class="inline-block text-edgreen relative before:absolute before:left-0 before:top-[calc(100%-6px)] before:w-[240px] before:h-[21px] bg-banner-2-title-vector">Budaya</span>
                            Provinsi Riau</span>',
                'date' => now(),
                'status' => 'published',
                'category' => 'hero-title',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Hero Subtitle',
                'description' => null,
                'content' => 'Jelajahi Keindahan
                        <span class="text-edgreen">Warisan Budaya</span> Riau',
                'date' => now(),
                'status' => 'published',
                'category' => 'hero-subtitle',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Hero Deskripsi',
                'description' => null,
                'content' => 'Temukan pesona budaya Melayu Riau yang kaya dengan tradisi dan sejarah. Dari seni hingga adat istiadat, mari kita lestarikan bersama keindahan yang tak lekang oleh waktu.',
                'date' => now(),
                'status' => 'published',
                'category' => 'hero-deskripsi',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Hero Gambar Utama 261x366',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'hero-main-image',
                'url_path' => null,
                'image_path' => 'assets/img/banner-2-img-2.jpg',
                'dimension' => '435x544'
            ],
            [
                'title' => 'Hero Background 1920x854',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'hero-background',
                'url_path' => null,
                'image_path' => 'assets/img/banner-2-img-1.jpg',
                'dimension' => '1920x854'
            ],
            [
                'title' => 'Hero Gambar Kedua 435x544',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'hero-secondary-image',
                'url_path' => null,
                'image_path' => 'assets/img/banner-2-img-1.jpg',
                'dimension' => '435x544'
            ],
            [
                'title' => 'Breadcrumb',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'breadcrumb',
                'url_path' => '/',
                'image_path' => 'assets/guest/img/breadcrumb-bg.jpg',
                'dimension' => '1920x599'
            ],
            [
                'title' => 'Tentang Kami',
                'description' => null,
                'content' => 'Pelajari dan Lestarikan
                        <span
                            class="inline-block text-edgreen font-bold relative before:absolute before:left-0 before:top-[calc(100%-6px)] before:w-[137px] before:h-[14px] bg-banner-2-title-vector before:bg-[length:100%_100%]">Warisan
                            Budaya</span>
                        untuk Masa Depan',
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-title',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Tentang Kami',
                'description' => null,
                'content' => 'Dinas Kebudayaan Provinsi Riau berkomitmen untuk melestarikan dan mengembangkan kebudayaan Melayu yang kaya. Kami mengajak masyarakat untuk terlibat dalam menjaga tradisi, seni, dan adat istiadat yang merupakan identitas kita bersama.',
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-deskripsi',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Tentang Kami Background 1920x812',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-background',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-us-bg.png',
                'dimension' => '1920x812'
            ],
            [
                'title' => 'Tentang Kami Gambar Utama 412x412',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-gambar-utama',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-2-image-1.png',
                'dimension' => '412x412'
            ],
            [
                'title' => 'Video Youtube Channel',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-channel-yt',
                'url_path' => 'https://youtu.be/K88OhAy7x9c',
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Nilai - Nilai',
                'description' => 'Pelestarian Budaya',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-values',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Nilai - Nilai',
                'description' => 'Bimbingan Ahli',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-values',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Nilai - Nilai',
                'description' => 'Komunitas Budaya',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-values',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Nilai - Nilai',
                'description' => 'Informasi Budaya',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'tentang-kami-values',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Sistem Informasi Tanah Riau - Si-Tari',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'sitari',
                'url_path' => 'http://sitari.disbud.riau.go.id/',
                'image_path' => 'assets/guest/img/cta-2-img.png',
                'dimension' => '353x413'
            ],
            [
                'title' => 'UPT Museum Title',
                'description' =>null,
                'content' => 'Pelestarian Budaya Riau
                        <span
                            class="text-edgreen font-bold relative before:absolute before:left-0 before:top-[calc(100%-6px)] before:w-[137px] before:h-[14px] bg-banner-2-title-vector before:bg-[length:100%_100%]">Museum
                            Sang Nila Utama</span>',
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-title',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'UPT Museum',
                'description' =>null,
                'content' => 'Museum Sang Nila Utama berkomitmen untuk melestarikan warisan budaya Riau yang kaya. Kami mengundang masyarakat untuk ikut serta dalam menjaga sejarah, seni, dan tradisi yang menjadi bagian dari identitas kita.',
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-deskripsi',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'UPT Museum Background 1920x812',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-background',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-us-bg.png',
                'dimension' => '1920x812'
            ],
            [
                'title' => 'UPT Museum Gambar Utama 412x412',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-gambar-utama',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-2-image-1.png',
                'dimension' => '412x412'
            ],
            [
                'title' => 'UPT Museum Video Youtube Channel',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-channel-yt',
                'url_path' => 'https://youtu.be/K88OhAy7x9c',
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Nilai - Nilai Museum',
                'description' => 'Pelestarian Budaya',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-values',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Nilai - Nilai Museum',
                'description' => 'Bimbingan Ahli',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-values',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Nilai - Nilai Museum',
                'description' => 'Komunitas Budaya',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-values',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Nilai - Nilai Museum',
                'description' => 'Informasi Budaya',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-values',
                'url_path' => null,
                'image_path' => null,
                'dimension' => null
            ],
            [
                'title' => 'Klasifikasi Filologi',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'upt-museum-klasifikasi',
                'url_path' => null,
                'image_path' => 'assets/guest/img/about-2-image-2.png',
                'dimension' => '353x413'
            ],
            [
                'title' => 'Background Footer 1920x515',
                'description' => null,
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'footer-background',
                'url_path' => null,
                'image_path' => 'assets/guest/img/footer-bg.jpg',
                'dimension' => '1920x515'
            ],
            [
                'title' => 'Pelestarian',
                'description' => 'Lestarikan warisan',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'informasi-category',
                'url_path' => null,
                'image_path' => 'assets/guest/img/footer-bg.jpg',
                'dimension' => 'Harus PNG tanpa memiliki background'
            ],
            [
                'title' => 'Festival',
                'description' => 'Rayakan seni',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'informasi-category',
                'url_path' => null,
                'image_path' => 'assets/guest/img/footer-bg.jpg',
                'dimension' => 'Harus PNG tanpa memiliki background'
            ],
            [
                'title' => 'Pembinaan',
                'description' => 'Dukung kreatifitas',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'informasi-category',
                'url_path' => null,
                'image_path' => 'assets/guest/img/footer-bg.jpg',
                'dimension' => 'Harus PNG tanpa memiliki background'
            ],
            [
                'title' => 'Informasi',
                'description' => 'Informasi budaya',
                'content' => null,
                'date' => now(),
                'status' => 'published',
                'category' => 'informasi-category',
                'url_path' => null,
                'image_path' => 'assets/guest/img/footer-bg.jpg',
                'dimension' => 'Harus PNG tanpa memiliki background'
            ],
        ]);
    }
}
