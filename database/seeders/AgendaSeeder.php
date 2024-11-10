<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\AgendaModel;
use Illuminate\Database\Seeder;
use App\Models\AgendaCategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (AgendaCategoryModel::all() as $item) {
            $user = User::inRandomOrder()->first();
            AgendaModel::factory()->count(5)->state([
                'agenda_category_id' => $item->id,
                'user_id' => $user->id
            ])->create();
        }
    }
}
