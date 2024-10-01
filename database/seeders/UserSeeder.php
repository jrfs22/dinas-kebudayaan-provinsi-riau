<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['super admin', 'admin'];
        foreach ($roles as $item) {
            $user = User::factory()->create([
                'role' => $item,
            ]);
        }

    }
}
