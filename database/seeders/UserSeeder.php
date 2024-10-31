<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Role::all() as $role) {
            $user = User::factory()->create([
                'role' => $role->name,
                'departement_id' => $role->name == 'super admin' ? 1 : 2
            ]);
            $user->assignRole($role);
        }
    }
}
