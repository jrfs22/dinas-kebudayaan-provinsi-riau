<?php

namespace Database\Seeders;

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
            AgendaSeeder::class,
            ArticleSeeder::class,
            GallerySeeder::class,
            NewsSeeder::class,
            SurveySeeder::class
        ]);
    }
}
