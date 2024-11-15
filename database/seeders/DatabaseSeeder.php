<?php

namespace Database\Seeders;

use Database\Seeders\RealDatas\AgendaSeederReal;
use Database\Seeders\RealDatas\ArticleSeederReal;
use Database\Seeders\RealDatas\GallerySeederReal;
use Database\Seeders\RealDatas\NewsSeederReal;
use Database\Seeders\RealDatas\SurveySeederReal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartementSeeder::class,
            RolesAndPermissionSeeder::class,
            UserSeeder::class,
            CompanyProfilesSeeder::class,
            CategoriesSeeder::class,
            // AgendaSeeder::class,
            // ArticleSeeder::class,
            // GallerySeeder::class,
            // NewsSeeder::class,
            // SurveySeeder::class

            AgendaSeederReal::class,
            ArticleSeederReal::class,
            GallerySeederReal::class,
            NewsSeederReal::class,
            SurveySeederReal::class
        ]);
    }
}
