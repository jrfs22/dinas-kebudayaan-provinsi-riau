<?php

namespace Database\Seeders;

use App\Models\AgendaCategoryModel;
use App\Models\AgendaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AgendaCategoryModel::insert([
            [
                'name' => 'festival',
            ],
        ]);
    }
}
