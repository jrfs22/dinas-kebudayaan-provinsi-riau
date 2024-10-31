<?php

namespace Database\Seeders;

use App\Models\DepartementModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartementModel::insert([
            [
                'name' => 'Disbud',
            ],
            [
                'name' => 'UPT Museum',
            ],
            [
                'name' => 'Sekretariat',
            ],
        ]);
    }
}
