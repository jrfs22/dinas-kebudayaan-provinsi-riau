<?php

namespace Database\Seeders\RealDatas;

use App\Models\User;
use App\Models\SurveyModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveySeederReal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::inRandomOrder()->first();

        SurveyModel::insert([
            [
                'user_id' => $user->id,
                'title' => 'Survey Kepuasan Pengunjung Museum Sejarah Riau',
                'slug' => '123/survey-kepuasan-pengunjung-museum-sejarah-riau',
                'summary' => 'Survey untuk mengukur tingkat kepuasan pengunjung terhadap layanan dan koleksi di Museum Sejarah Riau.',
                'content' => 'Survey ini bertujuan untuk mengetahui pengalaman pengunjung terkait fasilitas, koleksi, dan pelayanan yang diberikan oleh Museum Sejarah Riau.',
                'url_path' => 'https://docs.google.com/forms/d/e/1FAIpQLSe9zXTfyrlldaIF8Ch-hPPkgRQrRRv7aNTQ8HglUjhmYmgSrQ/viewform',
                'start_date' => '2024-10-01',
                'end_date' => '2024-10-31', // Survey selesai
                'status' => 'completed',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Survey Kepuasan Pengunjung Museum Seni Riau',
                'slug' => '123/survey-kepuasan-pengunjung-museum-seni-riau',
                'summary' => 'Survey untuk menilai kepuasan pengunjung terhadap koleksi seni di Museum Seni Riau.',
                'content' => 'Survey ini bertujuan untuk menggali pengalaman pengunjung tentang koleksi seni dan program pameran di Museum Seni Riau.',
                'url_path' => 'https://docs.google.com/forms/d/e/1FAIpQLSe9zXTfyrlldaIF8Ch-hPPkgRQrRRv7aNTQ8HglUjhmYmgSrQ/viewform',
                'start_date' => '2024-11-01',
                'end_date' => '2024-11-30', // Survey selesai
                'status' => 'completed',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Survey Pengalaman Pengunjung Museum Budaya Riau',
                'slug' => '123/survey-pengalaman-pengunjung-museum-budaya-riau',
                'summary' => 'Survey ini untuk menilai pengalaman pengunjung yang datang ke Museum Budaya Riau.',
                'content' => 'Survey ini bertujuan untuk mengevaluasi pengalaman pengunjung dalam mengeksplorasi koleksi budaya dan interaksi di Museum Budaya Riau.',
                'url_path' => 'https://docs.google.com/forms/d/e/1FAIpQLSe9zXTfyrlldaIF8Ch-hPPkgRQrRRv7aNTQ8HglUjhmYmgSrQ/viewform',
                'start_date' => '2024-11-10',
                'end_date' => '2024-12-10', // Survey aktif
                'status' => 'active',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Survey Kepuasan Pengunjung Museum Adityawarman',
                'slug' => '123/survey-kepuasan-pengunjung-museum-adityawarman',
                'summary' => 'Survey untuk mengukur kepuasan pengunjung terhadap koleksi etnografi di Museum Adityawarman.',
                'content' => 'Survey ini berfokus pada koleksi etnografi dan pengalaman pengunjung saat melihat pameran di Museum Adityawarman.',
                'url_path' => 'https://docs.google.com/forms/d/e/1FAIpQLSe9zXTfyrlldaIF8Ch-hPPkgRQrRRv7aNTQ8HglUjhmYmgSrQ/viewform',
                'start_date' => '2024-11-15',
                'end_date' => '2024-12-15', // Survey aktif
                'status' => 'active',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Survey Pengunjung Museum Adat Riau',
                'slug' => '123/survey-pengunjung-museum-adat-riau',
                'summary' => 'Survey untuk mengetahui kepuasan pengunjung mengenai koleksi dan pameran yang ada di Museum Adat Riau.',
                'content' => 'Survey ini bertujuan untuk mengumpulkan feedback tentang pengalaman pengunjung mengenai museum adat dan koleksi budaya lokal.',
                'url_path' => 'https://docs.google.com/forms/d/e/1FAIpQLSe9zXTfyrlldaIF8Ch-hPPkgRQrRRv7aNTQ8HglUjhmYmgSrQ/viewform',
                'start_date' => '2024-11-20',
                'end_date' => '2024-12-20', // Survey aktif
                'status' => 'active',
            ]
        ]);
    }
}
